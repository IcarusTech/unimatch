document.addEventListener('DOMContentLoaded', function() {
    const desplegable = document.getElementById('desplegable');
    const subselectsContainer = document.getElementById('subselects-container').children;

    desplegable.addEventListener('change', function() {
        for (let subselect of subselectsContainer) {
            subselect.style.display = 'none';
        }

        const selectedValue = desplegable.value;
        const selectedSubselect = document.getElementById(`${selectedValue}-subselect`);
        
        if (selectedSubselect) {
            selectedSubselect.style.display = 'block';
        }
    });

    // Hide all subselects initially
    for (let subselect of subselectsContainer) {
        subselect.style.display = 'none';
    }
});