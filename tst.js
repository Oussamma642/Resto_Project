function fetchOrderDetails(orderId)
{

    const BASE_URL = 'http://localhost:3000/api/order_items';

    const fetchDetails = async()=>{

        const reponse = await fetch(`${BASE_URL}/${orderId}`);
        const Data = await reponse.json();
    }
    fetchDetails();
}

function fetchOrderDetails(orderId) {

    const BASE_URL = 'http://localhost:3000/api/order_items';

    const fetchDetails = async () => {

        const reponse = await fetch(`${BASE_URL}/${orderId}`);
        const Data = await reponse.json();
       
        let detailsTable = '';

        for (let i = 0; i < Data.length; i++){
            detailsTable += `
            <tr>
                <td>${Data[i].DishName}</td>
                <td>${Data[i].price}</td>
                <td>${Data[i].quantity}</td>
                <td>${Data[i].delivery_address}</td>
                <td>${Data[i].status}</td>
            </tr>
        `;
        document.getElementById('orderDetails').innerHTML =
        Table;

        }
    
    }
    fetchDetails();

}
