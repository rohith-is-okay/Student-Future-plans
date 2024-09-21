window.onload = loadUniversities;// Call the function when the page loads

function validatePhoneNumber(input) {
    var phoneNumber = input.value.replace(/\D/g, ''); // Remove non-digit characters
    if (phoneNumber.length !== 10) {
        document.getElementById("phoneError").textContent = "Phone number must be 10 digits.";
    } else {
        document.getElementById("phoneError").textContent = "";
    }
}

function isNumberKey(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function toggleTextBox() {
    // Get the select element and the text box element
    var selectElement = document.getElementById("universities");
    var textBox = document.getElementById("otheruni");

    // Check the selected option's value
    if (selectElement.value === "Other") {
        textBox.disabled = false; // Enable the text box
    } else {
        textBox.disabled = true; // Disable the text box
    }
}

function confirmSubmission() {
    // Display a confirmation dialog
    var confirmation = confirm("Please Confirm All Information Has Been Entered Correctly!!!");
    
    // If the user confirms, allow form submission; otherwise, cancel it
    if (confirmation) {
        return true; // Allow form submission
    } else {
        return false; // Cancel form submission
    }
}

async function loadUniversities() {// Function to fetch the JSON data and populate the dropdown
    try {
        // Load the JSON file from the server
        const response = await fetch('world_universities_and_domains.json');
        
        // Parse the JSON data
        const universities = await response.json();

        // Get the <select> element by its ID
        const selectElement = document.getElementById('universities');

        // Loop through each university and create an <option> element
        universities.forEach(university => {
            const option = document.createElement('option');
            option.value = university.name;  // Set the value to the university's name
            option.text = university.name;   // Set the display text to the university's name
            selectElement.add(option);       // Add the option to the <select> element
        });
    } catch (error) {
        console.error('Error loading university data:', error);
    }
}

async function createPDF() {
    const fileInput = document.getElementById("pdfFiles");
    const downloadLink = document.getElementById("downloadLink");
    const files = fileInput.files;
    const fileList = document.getElementById("fileList");
    fileList.innerHTML = ""; // Clear previous file list

    if (files.length < 1) {
        alert("Please select at least one PDF file to create a new PDF.");
        return;
    }

    const pdfDoc = await PDFLib.PDFDocument.create();

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const fileName = file.name; // Get the file name
        fileList.innerHTML += `<p>File ${i + 1}: ${fileName}</p>`; // Display the file name

        const fileData = await file.arrayBuffer();
        const tempPdf = await PDFLib.PDFDocument.load(fileData);
        const copiedPages = await pdfDoc.copyPages(tempPdf, tempPdf.getPageIndices());
        copiedPages.forEach((page) => pdfDoc.addPage(page));
    }

    const createdPdfData = await pdfDoc.save();

    const blob = new Blob([createdPdfData], { type: "application/pdf" });
    const url = URL.createObjectURL(blob);
    downloadLink.href = url;
    downloadLink.download = "combined.pdf";
    downloadLink.style.display = "block";
}
