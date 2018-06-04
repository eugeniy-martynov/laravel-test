window.onload  =  () => {
    function createNode(json) {
        var div = document.createElement('tr');
        div.innerHTML =    `<th scope="row">${ json.id }</th>
                            <td>${ json.name }</td>
                            <td>${ json.quantity }</td>
                            <td>${ json.price }</td>`;
        return div;

    }

    let tableBody = document.querySelector('.contentTble tbody');
    let name =  document.querySelector('#name');
    let quantity =  document.querySelector('#quantity');
    let price =  document.querySelector('#price');
    document.querySelector('#submitBtn').onclick = () => {
        fetch('/product', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({name: name.value, quantity: quantity.value, price: price.value})
        }).then( (result) => {
            return result.json()
        }).then( (result) => {
            if(result.length != undefined){  // if error server return's array
               tableBody.appendChild(createNode(result));
            } else {
                 Object.keys(result).forEach(item =>  toastr.error(`field ${item}: ${result[item].join(' .')}`));

            }
        });

    }
}