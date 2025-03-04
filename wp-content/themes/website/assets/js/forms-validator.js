function initializeFormValidation(form, countryCodes = [], countryPhone = '') {
    // By default, the list of country codes contains []

    // Phone mask
    var phoneInputs = document.querySelectorAll('input[data-tel-input]');
    if (phoneInputs.length) {
        // Function to get only numeric characters
        var getInputNumbersValue = function (input) {
            return input.value.replace(/\D/g, '');
        }

        // Function to format the phone number
        var formatPhoneNumber = function (inputNumbersValue) {
            var formattedInputValue = "(";

            // Loop through each digit in the number
            for (var i = 0; i < inputNumbersValue.length && i < 10; i++) {
                if (i === 3) {
                    formattedInputValue += ") ";
                } else if (i === 6) {
                    formattedInputValue += " ";
                }
                formattedInputValue += inputNumbersValue[i];
            }

            return formattedInputValue;
        }

        var onPhoneInput = function (e) {
            var input = e.target,
                inputNumbersValue = getInputNumbersValue(input),
                selectionStart = input.selectionStart;

            if (!inputNumbersValue) {
                return input.value = "";
            }

            if (input.value.length !== selectionStart) {
                // Editing in the middle of input, not the last character
                if (e.data && /\D/g.test(e.data)) {
                    // Trying to enter a non-numeric character
                    input.value = inputNumbersValue;
                }
                return;
            }

            // Remove the first digit if it's one of the country codes
            for (var countryCode of countryCodes) {
                if (inputNumbersValue.startsWith(countryCode.toString())) {
                    inputNumbersValue = inputNumbersValue.slice(countryCode.toString().length);
                    break;
                }
            }

            // Format the phone number and set the new value
            input.value = formatPhoneNumber(inputNumbersValue);
        }

        for (var phoneInput of phoneInputs) {
            phoneInput.addEventListener('input', onPhoneInput, false);
        }
    }

    // Event handler for input for all text input fields
    let textInputs = document.querySelectorAll('.form-item-input');
    if (textInputs.length) {
        textInputs.forEach(function (input) {
            input.addEventListener('input', function (event) {
                let formItem = event.target.closest('.form-item');
                if (input.name === 'email') {
                    validateEmail(formItem, input);
                } else if (input.name === 'phone') {
                    validatePhone(formItem, input);
                } else {
                    validateInputOnInput(formItem, input);
                    validateInput(formItem, input);
                }
            });
        });
    }

    // Function to validate input on input for adding a checkmark
    function validateInputOnInput(formItem, input) {
        var isValid = input.value.trim() !== '';
        markAsActive(formItem, isValid);
        markAsError(formItem, 'input', isValid);
    }

    // Function to mark the input field as active
    function markAsActive(formItem, isValid) {
        let confirmCheck = formItem.querySelector('.form-item-confirm-check');
        if (confirmCheck) {
            confirmCheck.classList.toggle('_active', isValid);
        }
    }

    // Function to validate input
    function validateInput(formItem, input) {
        var isValid = true;
        var isRequired = formItem.getAttribute('aria-required') === 'true';
        if (isRequired && !input.value.trim()) {
            isValid = false;
        }

        markAsError(formItem, 'input', isValid);
        return isValid;
    }

    // Function to validate select
    function validateSelect(formItem, current) {
        var isValid = true;
        var isRequired = formItem.getAttribute('aria-required') === 'true';

        if (isRequired && current.innerText === 'Select') {
            isValid = false;
        }

        markAsError(formItem, 'select', isValid);
        return isValid;
    }

    // Function to validate phone number
    function validatePhone(formItem, input) {
        var phoneValue = input.value.trim().replace(/\D/g, '');
        var isValid = phoneValue.length >= 10 && phoneValue.length <= 10;
        markAsActive(formItem, isValid);
        markAsError(formItem, 'input', isValid);
        return isValid;
    }

    // Function to validate email
    function validateEmail(formItem, input) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var isValid = emailRegex.test(input.value.trim());
        markAsActive(formItem, isValid);
        markAsError(formItem, 'input', isValid);
        return isValid;
    }

    // Function to validate checkbox
    function validateCheckbox(formItem, customCheckbox) {
        var isValid = true;
        var isRequired = formItem.getAttribute('aria-required') === 'true';
        var checkboxInput = customCheckbox.querySelector('input');

        if (isRequired && !checkboxInput.checked) {
            isValid = false;
        }

        markAsError(formItem, 'checkbox', isValid);
        return isValid;
    }

    // Function to validate passwords
    function validatePasswords(passwordItem, passwordConfirmItem) {
        var passwordInput = passwordItem.querySelector('.form-item-input');
        var passwordConfirmInput = passwordConfirmItem.querySelector('.form-item-input');
        var isValid = true;
        var isRequired = passwordItem.getAttribute('aria-required') === 'true' || passwordConfirmItem.getAttribute('aria-required') === 'true';

        // Check for required fields
        if (isRequired && (!passwordInput.value.trim() || !passwordConfirmInput.value.trim())) {
            isValid = false;
        }

        // Check for password match
        if (passwordInput.value !== passwordConfirmInput.value) {
            isValid = false;
        }

        markAsError(passwordItem, 'input', isValid);
        markAsError(passwordConfirmItem, 'input', isValid);
        return isValid;
    }

    // Function to validate the uploaded file
    function validateFile(formItem, input) {
        var isValid = true;
        var isRequired = formItem.getAttribute('aria-required') === 'true';

        // Getting the file from the insta
        var file = input.files[0];

        // Check that the file exists, if the field is mandatory
        if (isRequired && !file) {
            isValid = false;
        }

        // If the file exists, check its type and size
        if (file) {
            var validFileTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            var maxSizeInBytes = 10 * 1024 * 1024; // 10MB

            if (!validFileTypes.includes(file.type)) {
                isValid = false;
            }

            if (file.size > maxSizeInBytes) {
                isValid = false;
            }
        }

        markAsError(formItem, 'input', isValid);
        return isValid;
    }

    // Function to validate the form
    function validateForm(form) {
        let isValid = true;

        let formItems = form.querySelectorAll('.form-item');

        formItems.forEach(function (formItem) {
            let input = formItem.querySelector('.form-item-input');
            let current = formItem.querySelector('.current');
            let customCheckbox = formItem.querySelector('.custom-checkbox');
            let passwordItem = form.querySelector('.form-item[field-name="password"]');
            let passwordConfirmItem = form.querySelector('.form-item[field-name="passwordConfirm"]');

            if (input) {
                if (input.name === 'email') {
                    isValid = validateEmail(formItem, input) && isValid;
                } else if (input.name === 'phone') {
                    isValid = validatePhone(formItem, input) && isValid;
                } else if (input.name !== 'password' && input.name !== 'passwordConfirm') {
                    isValid = validateInput(formItem, input) && isValid;
                }
            }

            if (current) {
                isValid = validateSelect(formItem, current) && isValid;
            }

            if (customCheckbox) {
                isValid = validateCheckbox(formItem, customCheckbox) && isValid;
            }

            if (passwordItem && passwordConfirmItem) {
                isValid = validatePasswords(passwordItem, passwordConfirmItem) && isValid;
            }

            if (input && input.type === 'file') {
                isValid = validateFile(formItem, input) && isValid;
            }
        });

        return isValid;
    }

    // Function marks the input field as erroneous
    function markAsError(formItem, type, isValid) {
        var element = null;

        switch (type) {
            case 'input':
                element = formItem.querySelector('.form-item-input');
                break;
            case 'select':
                element = formItem.querySelector('.nice-select');
                break;
            case 'checkbox':
                element = formItem.querySelector('.checkmark');
                break;
        }

        if (element) {
            element.classList.toggle('_error', !isValid);
        }
    }

    if (!form) {
        // Get all existing forms
        var forms = document.querySelectorAll('.form');
        if (forms.length) {
            forms.forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent default form submission

                    // Form validation
                    if (!validateForm(form)) {
                        return;
                    }
                });
            });
        }
    } else {
        // Form validation
        if (!validateForm(form)) {
            form.classList.add('validation-failed')
            return null;
        } else {
            form.classList.remove('validation-failed')
        }

        // Get form data
        var formData = new FormData(form);
        var formDataObject = {};
        for (var pair of formData.entries()) {
            formDataObject[pair[0]] = pair[1];
        }

        // Include selected values from select elements
        var selectElements = form.querySelectorAll('.nice-select');
        if (selectElements.length) {
            selectElements.forEach(function (selectElement) {
                var fieldName = selectElement.closest('.form-item').getAttribute('field-name');
                var selectedValue = selectElement.querySelector('.current').innerText;
                formDataObject[fieldName] = selectedValue;
            });
        }

        // Include checkbox values
        var checkboxInputs = form.querySelectorAll('.form-item-checkbox');
        if (checkboxInputs.length) {
            checkboxInputs.forEach(function (checkboxInput) {
                // console.log('field-name', checkboxInput.getAttribute('field-name'));

                if (checkboxInput.getAttribute('field-name')) {
                    var fieldName = checkboxInput.getAttribute('field-name');
                    var isChecked = checkboxInput.querySelector('input').checked;
                    formDataObject[fieldName] = isChecked;
                }
            });
        }

        // Log form data
        // console.log('Form submitted successfully!', formDataObject);

        if (formDataObject.phone && countryCodes.length === 1) {
            formDataObject.phone = formDataObject.phone;
        }

        if (formDataObject.phone && countryPhone) {
            formDataObject.phone = (countryPhone ? `+${countryPhone} ` : '') + formDataObject.phone;
        }

        // Remove unnecessary characters from the phone number
        if (formDataObject.phone && !countryPhone) {
            formDataObject.phone = formDataObject.phone.replace(/[\s()-]/g, '');
        }

        return formDataObject; // Return form data object in case of successful validation
    }
}