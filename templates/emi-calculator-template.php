<div class="headerBox">
    <h1>EMI Calculator</h1>
    <p>Calculate your monthly EMI, total interest and total amount payable on your loan.</p>
</div>
<div class="emi-calculator">
    <div class="emiCalculatorLeftBox">
        <div class="skdLoanInputBox">
            <div class="skdRow">
                <label for="skd-loan-amount">Loan Amount:</label>
                <div class="inputbox">
                    <span>₹</span>
                    <input type="number" id="skd-loan-amount-value" min="100000" max="100000000" step="1000" value="100000">
                </div>
            </div>
            <input class="range" type="range" id="skd-loan-amount" min="100000" max="100000000" step="1000" value="100000">
        </div>
        <div class="skdLoanInputBox">
            <div class="skdRow">
                <label for="skd-interest-rate">Rate of Interest (p.a):</label>
                <div class="inputbox">

                    <input type="number" id="skd-interest-rate-value" min="1" max="30" step="0.1" value="8.5">
                    <span>%</span>
                </div>
            </div>
            <input class="range" type="range" id="skd-interest-rate" min="1" max="30" step="0.1" value="8.5">
        </div>
        <div class="skdLoanInputBox">
            <div class="skdRow">
                <label for="skd-loan-tenure">Loan Tenure (years):</label>
                <div class="inputbox">
                    <input type="number" id="skd-loan-tenure-value" min="1" max="30" step="1" value="10">
                    <span>Yr</span>
                </div>
            </div>
            <input class="range" type="range" id="skd-loan-tenure" min="1" max="30" step="1" value="10">
        </div>
        <div class="skdLoanResultsBox">
            <h3>Results:</h3>
            <p>Monthly EMI: <span>₹<span id="skd-monthly-emi">0</span></span></p>
            <p>Principal Amount: <span>₹<span id="skd-principal-amount">0</span></span></p>
            <p>Total Interest: <span>₹<span id="skd-total-interest">0</span></span></p>
            <p>Total Amount: <span>₹<span id="skd-total-amount">0</span></span></p>
        </div>
    </div>
    <div class="progress-circle">
        <div class="circleTexts">
            <div class="circleText principalText"><span></span>Principal</div>
            <div class="circleText interestText"><span></span>Interest</div>
        </div>
        <svg width="100%" height="100%" viewBox="0 0 42 42" class="circular-chart dual">
            <circle class="circle principal" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#00a1ff" stroke-width="3"></circle>

            <circle class="circle interest" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#F50057" stroke-width="3" stroke-dasharray="85 15" stroke-dashoffset="25"></circle>

            <!-- <text x="21" y="20.35" class="percentage principal-text">0%</text>
            <text x="21" y="25.35" class="percentage interest-text">0%</text> -->
        </svg>
    </div>
</div>