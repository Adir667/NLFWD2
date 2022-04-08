window.addEventListener('DOMContentLoaded', (event) => {
    getWarehouse();
})

function getWarehouse() {

    const h2 = document.getElementById('h2')
    h2.innerText = "Warehouse";

    const packageDataElement = document.getElementById('packageTable')
    clearDashboardTable();
    fetch('/warehouse')
        .then(result => result.json())
        .then((out) => {
            displayWarehousePackages(out);
        })
        .catch((err) => console.error(err))
}

function createPackage() {
    const name = document.getElementById('form-name');
    const price = document.getElementById('form-price');
    const data = {
        'name': name.value,
        'price': price.value
    }

    fetch('/warehouse', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(out => {
            name.value = null;
            price.value = null;
            getWarehouse();
        })
        .catch(err => console.error(err));
}

function displayWarehousePackages(data) {
    const packageDataElement = document.getElementById('packageTable')
    data.forEach(
        package => (
            packageDataElement.innerHTML +=
                `<tr>
                    <td>${package.id}</td>
                    <td>${package.plan}</td>
                    <td class = table-active>${package.status}</td>
                    <td>${package.destination}</td>
                    <td><button class="btn btn-success" onclick="loadToTruck(${package.id})">Load to truck</button></td>
                    <td><button class="btn btn-light" onclick="deletePackage(${package.id})">Delete</button></td>`
        )
    )
}

function displayTruckPackages(data) {
    const packageDataElement = document.getElementById('packageTable')
    data.forEach(
        package => (
            packageDataElement.innerHTML +=
                `<tr>
                    <td>${package.id}</td>
                    <td>${package.plan}</td>
                    <td class = table-active>${package.status}</td>
                    <td>${package.destination}</td>
                    <td><button class="btn btn-success" onclick="dropOff(${package.id})">Drop off</button></td>`
        )
    )
}

function displayDeliveredPackages(data) {
    const packageDataElement = document.getElementById('packageTable')
    data.forEach(
        package => (
            packageDataElement.innerHTML +=
                `<tr>
                    <td>${package.id}</td>
                    <td>${package.plan}</td>
                    <td class = table-active>${package.status}</td>
                    <td>${package.destination}</td>
                    <td><button class="btn btn-danger" onclick="deletePackage(${package.id})">Delete</button></td>`
        )
    )
}

function dropOff(id) {

    const url = `truck/${id}`;
    fetch(url, {
        method: 'PUT',
    })
        .then(out => {
            getTruck();
        })
        .catch(err => console.error(err));

}

function deletePackage(id) {

    if (confirm("Are you sure you want to DELETE this package?")) {
        const url = `warehouse/${id}`;
        fetch(url, {
            method: 'DELETE',
        })
            .then(out => {
                getWarehouse();
            })
            .catch(err => console.error(err));
    } else {
        return;
    }
}

function loadToTruck(id) {

    const url = `truck/${id}`;
    fetch(url, {
        method: 'POST',
    })
        .then(out => {
            getWarehouse();
        })
        .catch(err => console.error(err));
}

function getTruck() {
    const h2 = document.getElementById('h2')
    h2.innerText = "Truck";

    const packageDataElement = document.getElementById('packageTable')
    clearDashboardTable();
    fetch('/truck')
        .then(result => result.json())
        .then((out) => {
            displayTruckPackages(out);
        })
        .catch((err) => console.error(err))
}

function getDelivered() {
    const h2 = document.getElementById('h2')
    h2.innerText = "Delivered";

    const packageDataElement = document.getElementById('packageTable')
    clearDashboardTable();
    fetch('/delivered')
        .then(result => result.json())
        .then((out) => {
            displayDeliveredPackages(out);
        })
        .catch((err) => console.error(err))
}

function clearDashboardTable() {
    const packageDataElement = document.getElementById('packageTable')
    packageDataElement.innerHTML = "";
}