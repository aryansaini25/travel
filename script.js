// Function to validate search form
function validateSearchForm() {
    let destination = document.querySelector("input[name='destination']").value;
    let startDate = document.querySelector("input[name='start_date']").value;
    let endDate = document.querySelector("input[name='end_date']").value;
    let errorMessage = document.querySelector(".error-message");

    // Clear any previous error message
    if (errorMessage) {
        errorMessage.remove();
    }

    // Check if all fields are filled
    if (destination === "" || startDate === "" || endDate === "") {
        displayErrorMessage("Please fill out all fields before searching.");
        return false;
    }
    
    // Validate if start date is earlier than end date
    if (new Date(startDate) > new Date(endDate)) {
        displayErrorMessage("End date should be later than the start date.");
        return false;
    }

    return true;
}

// Function to display error message
function displayErrorMessage(message) {
    let form = document.querySelector("form");
    let errorDiv = document.createElement("div");
    errorDiv.className = "error-message";
    errorDiv.style.color = "red";
    errorDiv.style.marginTop = "10px";
    errorDiv.innerText = message;
    form.appendChild(errorDiv);
}

// Function to show a loading spinner
function showLoadingSpinner() {
    let resultsSection = document.querySelector(".search-results");
    resultsSection.innerHTML = `
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
        <p>Searching for available trips...</p>
    `;
}

// Simulated search functionality using setTimeout (mocking AJAX)
function searchTrips() {
    if (!validateSearchForm()) {
        return; // Prevent form submission if validation fails
    }

    // Show loading spinner
    showLoadingSpinner();

    // Simulate fetching data with a delay
    setTimeout(function() {
        let resultsSection = document.querySelector(".search-results");
        resultsSection.innerHTML = `
            <h3>Search Results</h3>
            <div class="result-category">
                <h4>Available Flights</h4>
                <ul>
                    <li>Flight 123 - $350 - Departure: 10:00 AM</li>
                    <li>Flight 456 - $450 - Departure: 2:00 PM</li>
                </ul>
            </div>
            <div class="result-category">
                <h4>Available Hotels</h4>
                <ul>
                    <li>Hotel Sunshine - $120/night</li>
                    <li>Hotel Paradise - $180/night</li>
                </ul>
            </div>
            <div class="result-category">
                <h4>Available Activities</h4>
                <ul>
                    <li>Eiffel Tower Tour - $50</li>
                    <li>Seine River Cruise - $40</li>
                </ul>
            </div>`;
        
        // Scroll smoothly to the results
        resultsSection.scrollIntoView({ behavior: "smooth" });
    }, 2000); // 2 seconds delay to simulate server response
}

// CSS for the loading spinner
const spinnerStyles = document.createElement('style');
spinnerStyles.innerHTML = `
    .spinner {
        margin: 20px auto;
        width: 40px;
        height: 40px;
        position: relative;
        text-align: center;
    }

    .double-bounce1, .double-bounce2 {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #ff5f57;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;
        animation: bounce 2s infinite ease-in-out;
    }

    .double-bounce2 {
        animation-delay: -1s;
    }

    @keyframes bounce {
        0%, 100% { transform: scale(0.0); }
        50% { transform: scale(1.0); }
    }
`;
document.head.appendChild(spinnerStyles);

