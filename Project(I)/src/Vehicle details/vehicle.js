var selectedRow = null;

// Alert function
function showAlert(message, className) {
    const div = document.createElement('div');
    div.className = `alert alert-${className}`;
    div.appendChild(document.createTextNode(message));
    const container = document.querySelector('.container-3');
    const form = document.querySelector('.vechile-form');
    container.insertBefore(div, form);

    setTimeout(() => {
        document.querySelector('.alert').remove();
    }, 3000);
}

// Clear fields
function clearFields() {
    document.getElementById('vechile-id').value = '';
    document.getElementById('Load-type').value = '';
    document.getElementById('weight').value = '';
    document.getElementById('height').value = '';
    document.getElementById('width').value = '';
    document.getElementById('length').value = '';
}

// Add data
document.querySelector('#vechile-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const vechileId = document.getElementById('vechile-id').value;
    const Loadtype = document.getElementById('Load-type').value;
    const weight = document.getElementById('weight').value;
    const height = document.getElementById('height').value;
    const width = document.getElementById('width').value;
    const length = document.getElementById('length').value;

    if (vechileId === '' || Loadtype === '' || weight === '' || height === '' || width === '' || length === '') {
        showAlert('Please fill in all fields', 'danger');
    } else {
        if (selectedRow === null) {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${vechileId}</td>
                <td>${Loadtype}</td>
                <td>${weight}</td>
                <td>${height}</td>
                <td>${width}</td>
                <td>${length}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm edit">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm delete">Delete</a>
                </td>
            `;
            document.querySelector('#vechile-list').appendChild(tr);
            showAlert('Vehicle detail Added', 'success');
        } else {
            // Update the selected row
            selectedRow.children[0].textContent = vechileId;
            selectedRow.children[1].textContent = Loadtype;
            selectedRow.children[2].textContent = weight;
            selectedRow.children[3].textContent = height;
            selectedRow.children[4].textContent = width;
            selectedRow.children[5].textContent = length;
            selectedRow = null;
            showAlert('Vehicle detail Updated', 'success');
        }
        clearFields();
    }
});

// Delete vehicle
document.querySelector('#vechile-list').addEventListener('click', function(event) {
    if (event.target.classList.contains('delete')) {
        event.target.parentElement.parentElement.remove();
        showAlert("Vehicle detail Deleted", "danger");
    }

    // Edit vehicle
    if (event.target.classList.contains('edit')) {
        selectedRow = event.target.parentElement.parentElement;
        document.getElementById('vechile-id').value = selectedRow.children[0].textContent;
        document.getElementById('Load-type').value = selectedRow.children[1].textContent;
        document.getElementById('weight').value = selectedRow.children[2].textContent;
        document.getElementById('height').value = selectedRow.children[3].textContent;
        document.getElementById('width').value = selectedRow.children[4].textContent;
        document.getElementById('length').value = selectedRow.children[5].textContent;
    }
});