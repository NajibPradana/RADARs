document.addEventListener('DOMContentLoaded', function() {
    console.log('Script loaded'); // Debugging step

    var dropdownButton = document.getElementById('dropdownRadioButton');
    var dropdownMenu = document.getElementById('dropdownRadio');
    var radioButtons = document.querySelectorAll('input[name="filter-radio"]');

    if (!dropdownButton || !dropdownMenu) {
        console.error('Dropdown elements not found');
        return;
    }

    dropdownButton.addEventListener('click', function(event) {
        dropdownMenu.classList.toggle('hidden');
        event.stopPropagation(); // Mencegah event bubbling
    });

    window.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });

    // Event listener untuk radio buttons
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
            var label = this.nextElementSibling.innerText;
            dropdownButton.querySelector('span').innerText = label;
            dropdownMenu.classList.add('hidden');
        });
    });
});
