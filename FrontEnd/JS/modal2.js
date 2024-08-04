document.addEventListener('DOMContentLoaded', () => {
    const select = document.getElementById('dona');
    const donateButton = document.querySelector('.donar-btn');
    const forms = {
        monetario: document.getElementById('form-monetario'),
        alimentario: document.getElementById('form-alimentario'),
        ropa: document.getElementById('form-ropa')
    };

    donateButton.addEventListener('click', () => {
        const selectedValue = select.value;
        Object.keys(forms).forEach(key => {
            forms[key].style.display = 'none';
        });
        if (forms[selectedValue]) {
            forms[selectedValue].style.display = 'block';
        }
    });
});
