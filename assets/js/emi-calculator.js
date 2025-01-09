jQuery(document).ready(function ($) {
    console.log('EMI Calculator loaded');

    function calculateEMI(loanAmount, annualInterestRate, loanTenure) {
        let monthlyInterestRate = annualInterestRate / (12 * 100);
        let numberOfMonths = loanTenure * 12;
        let emi =
            (loanAmount * monthlyInterestRate *
                Math.pow(1 + monthlyInterestRate, numberOfMonths)) /
            (Math.pow(1 + monthlyInterestRate, numberOfMonths) - 1);
        return emi;
    }

    function updateEMIValues() {
        let loanAmount = parseInt($('#skd-loan-amount').val());
        let annualInterestRate = parseFloat($('#skd-interest-rate').val());
        let loanTenure = parseInt($('#skd-loan-tenure').val());

        let emi = calculateEMI(loanAmount, annualInterestRate, loanTenure);
        let totalAmount = emi * loanTenure * 12;
        let totalInterest = totalAmount - loanAmount;

        $('#skd-monthly-emi').text(emi.toFixed(2));
        $('#skd-principal-amount').text(loanAmount.toFixed(2));
        $('#skd-total-interest').text(totalInterest.toFixed(2));
        $('#skd-total-amount').text(totalAmount.toFixed(2));

        // Update circular charts
        let principalPercentage = (loanAmount / totalAmount) * 100;
        let interestPercentage = (totalInterest / totalAmount) * 100;

        updateCircularChart(principalPercentage, interestPercentage);
    }

    function updateCircularChart(principalPercentage, interestPercentage) {
        let principalCircle = $('.principal');
        let interestCircle = $('.interest');
        let totalPercentage = principalPercentage + interestPercentage;
        let radius = principalCircle.attr('r');
        let circumference = 2 * Math.PI * radius;

        // Set dasharray and dashoffset for principal
        // let principalOffset = circumference - (principalPercentage / 100) * circumference;
        // principalCircle.css('stroke-dasharray', `${principalPercentage} ${100 - principalPercentage}`);
        // principalCircle.css('stroke-dashoffset', principalOffset);

        // Set dasharray and dashoffset for interest
        let interestOffset = circumference - (interestPercentage / 100) * circumference;
        interestCircle.css('stroke-dasharray', `${interestPercentage} ${100 - interestPercentage}`);
        // interestCircle.css('stroke-dashoffset', interestOffset);

        // Update the text
        $('.principal-text').text(principalPercentage.toFixed(2) + '%');
        $('.interest-text').text(interestPercentage.toFixed(2) + '%');
    }

    $('#skd-loan-amount').on('input', function () {
        $('#skd-loan-amount-value').val($(this).val());
        updateEMIValues();
    });

    $('#skd-interest-rate').on('input', function () {
        $('#skd-interest-rate-value').val($(this).val());
        updateEMIValues();
    });

    $('#skd-loan-tenure').on('input', function () {
        $('#skd-loan-tenure-value').val($(this).val());
        updateEMIValues();
    });

    // Function to validate input value against its min and max
    function validateInput(input, min, max) {
        let value = parseInt(input.val());
        if (!value || value < 1) {
            input.attr("placeholder", "0");
            input.css('border-color', 'red');
            input.next('.skd-error-message').remove();  // Remove existing error message if any
            input.after(`<span class="skd-error-message" style="color:red;">Value must be between ${min} and ${max}</span>`);
            return false;
        } else if (value < min || value > max) {
            input.css('border-color', 'red');
            input.next('.skd-error-message').remove();  // Remove existing error message if any
            input.after(`<span class="skd-error-message" style="color:red;">Value must be between ${min} and ${max}</span>`);
            return false;
        } else {
            input.css('border-color', '');
            input.next('.skd-error-message').remove();  // Remove error message
            return true;
        }
    }

    $('#skd-loan-amount-value').on('input', function () {
        const min = parseInt($('#skd-loan-amount').attr('min'));
        const max = parseInt($('#skd-loan-amount').attr('max'));
        if (validateInput($(this), min, max)) {
            $('#skd-loan-amount').val($(this).val());
            updateEMIValues();
        } else {
            $('#skd-loan-amount').val(min);
        }
    });

    $('#skd-interest-rate-value').on('input', function () {
        const min = parseFloat($('#skd-interest-rate').attr('min'));
        const max = parseFloat($('#skd-interest-rate').attr('max'));
        if (validateInput($(this), min, max)) {
            $('#skd-interest-rate').val($(this).val());
            updateEMIValues();
        } else {
            $('#skd-interest-rate').val(min);
        }
    });

    $('#skd-loan-tenure-value').on('input', function () {
        const min = parseInt($('#skd-loan-tenure').attr('min'));
        const max = parseInt($('#skd-loan-tenure').attr('max'));
        if (validateInput($(this), min, max)) {
            $('#skd-loan-tenure').val($(this).val());
            updateEMIValues();
        } else {
            $('#skd-loan-tenure').val(min);
        }
    });

    // Initial calculation
    updateEMIValues();
});

// document.getElementById("skd-loan-amount").oninput = function () {
//     var gradientPosition = (this.value / 2 * 25);

//     console.log(gradientPosition);

//     this.style.background = 'linear-gradient(to right, #000 0%, #000 ' + gradientPosition + '%, red ' + gradientPosition + '%, red 100%)'
// };
