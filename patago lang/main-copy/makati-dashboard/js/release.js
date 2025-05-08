document.addEventListener("DOMContentLoaded", function () {
  const buttonAdd = document.getElementById("buttonAdd");
  const buttonRelease = document.getElementById("buttonRelease");
  const orderedItemsContainer = document.getElementById("orderedItems");
  let orderedItems = [];

  // Function to update total price
  function updateTotalPrice() {
    let quantity =
      parseFloat(document.getElementById("inputQuantity").value) || 0;
    let price = parseFloat(document.getElementById("inputPrice").value) || 0;
    let total = quantity * price;
    document.getElementById("labelTotalPrice").textContent = total.toFixed(2);
  }

  // Update total price on input change
  document
    .getElementById("inputQuantity")
    .addEventListener("input", updateTotalPrice);
  document
    .getElementById("inputPrice")
    .addEventListener("input", updateTotalPrice);

  // Add Product to Order List
  buttonAdd.addEventListener("click", function () {
    const productName = document
      .getElementById("inputProductName")
      .value.trim();
    const productSize = document
      .getElementById("inputProductSize")
      .value.trim();
    const quantity = parseInt(document.getElementById("inputQuantity").value);
    const price = parseFloat(document.getElementById("inputPrice").value);
    const totalPrice = quantity * price;

    if (
      !productName ||
      !productSize ||
      isNaN(quantity) ||
      isNaN(price) ||
      quantity <= 0 ||
      price <= 0
    ) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Please enter valid product details before adding!",
      });
      return;
    }

    const item = {
      productName,
      productSize,
      quantity,
      price,
      totalPrice,
    };

    orderedItems.push(item);

    // Display added product in the list
    const itemDiv = document.createElement("div");
    itemDiv.className = "ordered-item";
    itemDiv.innerHTML = `
            <span>Product Name: ${productName}</span>
            <span>Product Size: ${productSize}</span>
            <span>Quantity: ${quantity}</span>
            <span>Price: ${price.toFixed(2)}</span>
            <span>Total Price: ${totalPrice.toFixed(2)}</span>
            <button class="delete">Delete</button>
        `;

    orderedItemsContainer.appendChild(itemDiv);

    // Delete button functionality
    itemDiv.querySelector(".delete").addEventListener("click", function () {
      orderedItems = orderedItems.filter((i) => i !== item);
      itemDiv.remove();
    });

    // Clear input fields
    document.getElementById("inputProductName").value = "";
    document.getElementById("inputProductSize").value = "";
    document.getElementById("inputQuantity").value = "";
    document.getElementById("inputPrice").value = "";
    document.getElementById("labelTotalPrice").textContent = "0.00";
  });

  // Release Order
  buttonRelease.addEventListener("click", function () {
    const customerName = document.getElementById("customerName").value.trim();
    const customerNum = document.getElementById("customerNum").value.trim();
    const customerAdd = document.getElementById("customerAdd").value.trim();

    if (!customerName || !customerNum || !customerAdd) {
      Swal.fire("Error", "Please fill in all customer details.", "error");
      return;
    }

    if (orderedItems.length === 0) {
      Swal.fire("Error", "No valid products added.", "error");
      return;
    }

    $.ajax({
      url: "confirm.php",
      type: "POST",
      data: {
        customer_name: customerName,
        customer_num: customerNum,
        customer_add: customerAdd,
        products: JSON.stringify(orderedItems), // Send as JSON string
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          Swal.fire("Success", response.message, "success");
          orderedItems = []; // Clear order list
          orderedItemsContainer.innerHTML = ""; // Clear displayed items
        } else {
          Swal.fire("Error", response.message, "error");
        }
      },
      error: function (xhr, status, error) {
        console.log("AJAX Error:", xhr.responseText);
        Swal.fire("Error", "Something went wrong: " + error, "error");
      },
    });
  });
});
