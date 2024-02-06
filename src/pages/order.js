
        let orderItems = [];
        let totalOrder = 0;
        function prepareOrderData() {
            // Prepare order data
            let orderItems = JSON.stringify(orderItems);
            document.getElementById('order_items_input').value = orderItems;
        }
        function addToOrder(id, name, price) {
            // Check if the item is already in the order
            const existingItem = orderItems.find(item => item.id === id);

            if (existingItem) {
                // Item is already in the order, update quantity
                existingItem.quantity += 1;
                // Update the quantity dynamically on the menu list
                document.getElementById(`quantity_${id}`).innerText = existingItem.quantity;
            } else {
                // Add item to order
                orderItems.push({ id, name, price, quantity: 1 });
            }

            // Update order details
            updateOrderDetails();

            // Update total order
            calculateTotalOrder();

            // Update total bill
            updateTotalBill();
        }

        function removeFromOrder(id) {
            // Find the index of the item in the order
            const index = orderItems.findIndex(item => item.id === id);

            if (index !== -1) {
                // Remove one quantity of the item
                orderItems[index].quantity -= 1;

                // Update the quantity dynamically on the menu list
                document.getElementById(`quantity_${id}`).innerText = orderItems[index].quantity;

                // Remove the item if the quantity becomes zero
                if (orderItems[index].quantity === 0) {
                    orderItems.splice(index, 1);
                }

                // Update order details
                updateOrderDetails();

                // Update total order
                calculateTotalOrder();

                // Update total bill
                updateTotalBill();
            }
        }

        function updateOrderDetails() {
            const orderDetailsList = document.getElementById('orderDetails');
            orderDetailsList.innerHTML = '';
        }

        function calculateTotalOrder() {
            // Calculate total order based on item quantities
            totalOrder = orderItems.reduce((total, item) => total + item.price * item.quantity, 0);
            document.getElementById('totalOrder').innerText = totalOrder.toFixed(2);
        }

        function updateTotalBill() {
            const taxPercentage = 5;
            const shippingFee = 5.00;

            // Calculate tax
            const tax = (totalOrder * (taxPercentage / 100)).toFixed(2);
            document.getElementById('tax').innerText = tax;

            // Calculate total bill
            const totalBill = (totalOrder + parseFloat(tax) + shippingFee).toFixed(2);
            document.getElementById('totalBill').innerText = totalBill;
        }
  