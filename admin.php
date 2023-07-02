<?php 
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {
?>
 
 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/scripts.js" defer="sync"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Viga&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Passion+One&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet">


  <style>
    .small-image {
      width: 25%;
    }

    .error-message {
      color: red;
      font-size: 12px;
      margin-left: 5px;
    }

    #adminNav {
      min-height: 3.5rem;
      background-color: #fff;
    }
     .navbar-toggler {
      font-size: 80%;
      padding: 0.75rem;
      color: #64a19d;
      border: 1px solid #64a19d;
    }
     .navbar-toggler:focus {
      outline: none;
    }
    .nav-transparent .navbar-brand {
      font-weight: 700;
      padding: 0.9rem 0;
    }
    
    .nav-default .navbar-brand {
      font-weight: 700;
      padding: 0.9rem 0;
    }
    
     .navbar-nav .nav-item:hover {
      color: fade(#fff, 80%);
      outline: none;
      background-color: transparent;
    }
     .navbar-nav .nav-item:active,  .navbar-nav .nav-item:focus {
      outline: none;
      background-color: transparent;
    }
    
    @media (min-width: 992px) {
      .nav-transparent {
        padding-top: 0;
        padding-bottom: 0;
        border-bottom: none;
        background-color: transparent;
        transition: background-color 0.3s ease-in-out;
      }
      
      .nav-default {
        color:#444;
        padding-top: 0;
        padding-bottom: 0;
        border-bottom: none;
        transition: background-color 0.3s ease-in-out;
      }
    
      .nav-default .navbar-brand {
        padding: 0rem 0.5rem;
        font-size: 150%;
        color: rgb(248, 117, 150);
      }
    
      .nav-transparent .navbar-brand {
        padding: 0rem 0.5rem;
        font-size: 150%;
        color: rgba(255, 255, 255, 0.75);
      }
    
      .nav-transparent .nav-link {
        transition: none;
        padding: 2rem 1.5rem;
        color: rgba(255, 255, 255, 0.5);
      }
    
      .nav-transparent .material-icons {
        color: rgba(255, 255, 255, 0.5);
        padding: 0.5rem
      }
    
      .nav-transparent .nav-link:hover {
        color: rgba(255, 255, 255, 0.75);
      }
    
      .navbar-shrink {
        background-color: #fff;
      }
    
      .navbar-shrink .navbar-brand, .nav-default .navbar-brand {
        font-size: 130%;
        color: rgb(248, 117, 150);
      }
      .navbar-shrink .nav-link, .nav-default .nav-link {
        color: #444;
        padding: 1.5rem 1.5rem 1.25rem;
        border-bottom: 0.25rem solid transparent;
      }
    
      .navbar-shrink .material-icons, .nav-default .material-icons {
        color: #444;
        padding: 0.5rem
      }
    
      .navbar-shrink .nav-link:hover, .nav-default .nav-link:hover {
        color: #ffffff;
        background-color: #48999F;
      }
    
      .navbar-shrink .nav-link:active, .nav-default .nav-link:active {
        color: #ffffff;
        background-color: #48999F;
      }
    
    }
  </style>
</head>

<body id="admin-body">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="adminNav">
    <div class="container secondary-med px-lg-3 d-flex align-text-center">
      <a class="navbar-brand" href="index.html">
        HIBIKE
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link fw-bold" href="index.html">HOME</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link fw-bold dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">PRODUCTS</a>
            <ul class="dropdown-menu border-0 bg-white" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="products.php">ALL PRODUCTS</a></li>
              <li><a class="dropdown-item" href="products.php">COLLECTIONS</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="about.html">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="contact.html">CONTACT</a>
          </li>
        </ul>

        <div class="icons d-flex align-items-center">
          <p class="primary-med">Current admin: <?php echo $_SESSION['Displayname'];?></p>
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid px-5  pt-5 mt-5">
    <div class="row">
      <!-- Tab Menu -->
      <div class="col-md-2">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order" type="button"
              role="tab" aria-controls="order" aria-selected="true">Order Tracking</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button"
              role="tab" aria-controls="product" aria-selected="false">Product Listing</button>
          </li>
        </ul>
      </div>
      <!-- Content Board -->
      <div class="col-md-10">
        <div class="tab-content" id="myTabContent">
          <!-- Order tracking -->
          <div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="order-tab">
            <div class="container">
              <h1>Order Details</h1>
              <div class="row mb-3">
                <!-- Search Bar -->
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" id="searchOrderInput" class="form-control" placeholder="Search">
                  </div>
                </div>
              </div>
              <table class="table table-striped over">
                <thead>
                  <tr>
                    <th style="vertical-align: middle; text-align: center;">Order ID</th>
                    <th style="vertical-align: middle; text-align: center;">Date of Order</th>
                    <th style="vertical-align: middle; text-align: center;">Product</th>
                    <th style="vertical-align: middle; text-align: center;">Order Value</th>
                    <th style="vertical-align: middle; text-align: center;">Buyer Name</th>
                    <th style="vertical-align: middle; text-align: center;">Buyer Phone</th>
                    <th style="vertical-align: middle; text-align: center;">Buyer Email</th>
                    <th style="vertical-align: middle; text-align: center;">Buyer Region</th>
                    <th style="vertical-align: middle; text-align: center;">Buyer City</th>
                    <th style="vertical-align: middle; text-align: center;">Buyer Address</th>
                  </tr>
                </thead>
                <tbody id="orderTable">
                </tbody>
              </table>
            </div>
          </div>
          <!-- Product listing -->
          <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
            <div class="container">
              <h1>Shop Inventory</h1>
              <div class="row mb-3">
                <!-- Search Bar -->
                <div class="col-md-6">
                  <div class="input-group">
                    <input type="text" id="searchProductInput" class="form-control" placeholder="Search">
                  </div>
                </div>
                <!-- Add Button -->
                <div class="col-md-6 text-end">
                  <button class="btn btn-success" type="button" data-bs-toggle="modal"
                    data-bs-target="#addItemModal">Add Item</button>
                </div>
              </div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Purchases</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody id="productTable">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Fetch Order Data -->
  <script>
    $(document).ready(function () {
      // Function to fetch data from PHP and populate the table
      function fetchOrders() {
        $('#orderTable').empty();
        $.ajax({
          url: 'fetch_orders.php',
          dataType: 'json',
          success: function (data) {
            if (data.length > 0) {
              populateTable(data);
            } else {
              displayEmptyMessage();
            }
          },
          error: function () {
            displayErrorMessage();
          }
        });
      }
      // Function to populate the table with data
      function populateTable(data) {
        var tableBody = $('#orderTable');
        data.forEach(function (order) {
          var row = $('<tr>');
          row.append($('<td>').text(order.id));
          row.append($('<td>').text(order.order_date));
          row.append($('<td>').text(order.product_name));
          row.append($('<td>').text(order.product_price));
          row.append($('<td>').text(order.buyer_name));
          row.append($('<td>').text(order.buyer_phone));
          row.append($('<td>').text(order.buyer_email));
          row.append($('<td>').text(order.buyer_region));
          row.append($('<td>').text(order.buyer_city));
          row.append($('<td>').text(order.buyer_address));
          tableBody.append(row);
        });
      }
      // Function to display an error message
      function displayErrorMessage() {
        var tableBody = $('#orderTable');
        tableBody.append('<tr><td colspan="10">Error loading orders.</td></tr>');
      }
      // Function to display a message for empty data
      function displayEmptyMessage() {
        var tableBody = $('#orderTable');
        tableBody.append('<tr><td colspan="10">No orders found.</td></tr>');
      }
      // Call the fetchOrders function to populate the table
      fetchOrders();
      // Keep Data Up2Date
      // setInterval(fetchOrders, 5000);
    });
  </script>

  <!-- Fetch Product Data + Automatically add Edit and Delete Button -->
  <script>
    // Function to fetch product data from PHP and populate the table
    function fetchProducts() {
      $('#productTable').empty();
      $.ajax({
        url: 'fetch_products.php',
        dataType: 'json',
        success: function (data) {
          if (data.length > 0) {
            populateTable(data);
          } else {
            displayEmptyMessage();
          }
        },
        error: function () {
          displayErrorMessage();
        }
      });
    }

    // Keep Data Up2Date
    // setInterval(fetchProducts, 5000);

    // Function to populate the table with product data
    function populateTable(data) {
      var tableBody = $('#productTable');
      data.forEach(function (product) {
        var row = $('<tr>');
        row.append($('<td>').text(product.name));
        row.append($('<td>').text(product.price));
        row.append($('<td>').text(product.type));
        row.append($('<td>').text(product.brand));
        row.append($('<td>').text(product.purchases));
        row.append($('<td>').html('<img src="' + product.image +
          '" alt="Product Image" class="img-fluid small-image">'));
        // Add Edit button
        var editButton = $('<button>').addClass('btn btn-primary btn-sm edit-button').text('Edit');
        editButton.attr('data-item-id', product.id);
        editButton.attr('data-bs-toggle', 'modal');
        editButton.attr('data-bs-target', '#editItemModal');
        row.append($('<td>').append(editButton));
        // Add Delete button
        var deleteButton = $('<button>').addClass('btn btn-danger btn-sm delete-button').text('Delete');
        deleteButton.attr('data-item-id', product.id);
        deleteButton.attr('data-bs-toggle', 'modal');
        deleteButton.attr('data-bs-target', '#deleteItemModal');
        row.append($('<td>').append(deleteButton));
        tableBody.append(row);
      });
      // Function to load row values into Edit Form
      function loadRowValuesToForm(row) {
        var itemName = row[0].cells[0].innerText;
        var itemPrice = row[0].cells[1].innerText;
        var itemType = row[0].cells[2].innerText;
        var itemBrand = row[0].cells[3].innerText;
        var itemImage = row[0].cells[5].querySelector('img').src;
        $('#itemNameEdit').val(itemName);
        $('#itemPriceEdit').val(itemPrice);
        $('#itemTypeEdit').val(itemType);
        $('#itemBrandEdit').val(itemBrand);
        $('#itemImageEdit').val(itemImage);
      }
      // Handle click events for Edit buttons
      $('.edit-button').on('click', function () {
        var row = $(this).closest('tr');
        loadRowValuesToForm(row);
        //Pass ID
        var itemId = $(this).attr('data-item-id');
        $('#itemIdEdit').val(itemId);
      });
      // Handle click events for Delete buttons
      $('.delete-button').on('click', function () {
        var itemId = $(this).attr('data-item-id');
        $('#itemIdDelete').val(itemId);
      });
    }
    // Function to display an error message
    function displayErrorMessage() {
      var tableBody = $('#productTable');
      tableBody.append('<tr><td colspan="7">Error loading products.</td></tr>');
    }
    // Function to display a message for empty data
    function displayEmptyMessage() {
      var tableBody = $('#productTable');
      tableBody.append('<tr><td colspan="7">No products found.</td></tr>');
    }
    $(document).ready(function () {
      // Call the fetchProducts function to populate the table
      fetchProducts();
    });
  </script>

<!-- Add Item Modal -->
  <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addForm">
          <div class="modal-body">
            <div class="mb-3">
              <label for="itemNameAdd" class="form-label">Name</label>
              <input type="text" class="form-control" id="itemNameAdd" placeholder="Product's Name" required>
            </div>
            <div class="mb-3">
              <label for="itemPriceAdd" class="form-label">Price</label>
              <input type="text" class="form-control" id="itemPriceAdd" placeholder="Product's Price"
                oninput="validateInput(event)" required>
            </div>
            <div class="mb-3">
              <label for="itemTypeAdd" class="form-label">Type</label>
              <select class="form-control" id="itemTypeAdd" required>
                <option selected disabled value="">-Choose a type-</option>
                <option value="Guitar">Guitar</option>
                <option value="Bass">Bass</option>
                <option value="Drum">Drum</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Wind">Wind</option>
                <option value="Amp">Amp</option>
                <!-- Add more options as needed -->
              </select>
            </div>
            <div class="mb-3">
              <label for="itemBrandAdd" class="form-label">Brand</label>
              <select class="form-control" id="itemBrandAdd" required>
                <option selected disabled value="">-Choose a brand-</option>
                <option value="Yamaha">Yamaha</option>
                <option value="Epiphone">Epiphone</option>
                <option value="Fender">Fender</option>
                <option value="Gibson">Gibson</option>
                <option value="Ibanez">Ibanez</option>
                <option value="Roland">Roland</option>
                <option value="Boss">Boss</option>
                <!-- Add more options as needed -->
              </select>
            </div>
            <div class="mb-3">
              <label for="itemImageAdd" class="form-label">Image</label>
              <input type="text" class="form-control" id="itemImageAdd" placeholder="Image URL" required>
            </div>
            <div class="mb-3">
              <label for="itemDescriptionAdd" class="form-label">Description</label>
              <textarea class="form-control" placeholder="Description" id="itemDescriptionAdd" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="validateCharInput(event, this)">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Item Modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editForm">
        <div class="modal-body">
          <input type="text" id="itemIdEdit" class="d-none">
          <div class="mb-3">
            <label for="itemNameEdit" class="form-label">Name</label>
            <input type="text" class="form-control" id="itemNameEdit" placeholder="Product's Name" required>
          </div>
          <div class="mb-3">
            <label for="itemPriceEdit" class="form-label">Price</label>
            <input type="text" class="form-control" id="itemPriceEdit" placeholder="Product's Price" oninput="validateInput(event)" required>
          </div>
          <div class="mb-3">
            <label for="itemTypeEdit" class="form-label">Type</label>
              <select class="form-control" id="itemTypeEdit" required>
                <option selected disabled value="">-Choose a type-</option>
                <option value="Guitar">Guitar</option>
                <option value="Bass">Bass</option>
                <option value="Drum">Drum</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Wind">Wind</option>
                <option value="Amp">Amp</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <div class="mb-3">
            <label for="itemBrandEdit" class="form-label">Brand</label>
              <select class="form-control" id="itemBrandEdit" required>
                <option selected disabled value="">-Choose a brand-</option>
                <option value="Yamaha">Yamaha</option>
                <option value="Epiphone">Epiphone</option>
                <option value="Fender">Fender</option>
                <option value="Gibson">Gibson</option>
                <option value="Ibanez">Ibanez</option>
                <option value="Roland">Roland</option>
                <option value="Boss">Boss</option>
                <!-- Add more options as needed -->
            </select>
          </div>
          <div class="mb-3">
            <label for="itemImageEdit" class="form-label">Image</label>
            <input type="text" class="form-control" id="itemImageEdit" placeholder="Image URL" required>
          </div>
          <div class="mb-3">
            <label for="itemDescriptionEdit" class="form-label">Description</label>
            <textarea class="form-control" placeholder="Description" id="itemDescriptionEdit" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <!-- Delete Item Modal -->
  <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteItemModalLabel">Delete Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="itemIdDelete" class="d-none">
          <p>Are you sure you want to delete this item?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="delteFormButton">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Search for Order table -->
  <script>
    $(document).ready(function () {
      $("#searchOrderInput").on("keyup", function () {
        var value = $(this).val().toLowerCase().trim();
        $("#orderTable tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <!-- Search for Product Table -->
  <script>
    $(document).ready(function () {
      $("#searchProductInput").on("keyup", function () {
        var value = $(this).val().toLowerCase().trim();
        $("#productTable tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <!-- Add, Edit and Delete Item Function -->
  <script>
    // ADD ITEM
    $(document).ready(function () {
      // Attach a submit event listener to the form
      $('#addForm').submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();
        // Get the input values
        var name = $('#itemNameAdd').val();
        var price = $('#itemPriceAdd').val();
        var type = $('#itemTypeAdd').val();
        var brand = $('#itemBrandAdd').val();
        var image = $('#itemImageAdd').val();
        var description = $('#itemDescriptionAdd').val();
        // Create an object with the values to send
        var data = {
          name: name,
          price: price,
          type: type,
          brand: brand,
          image: image,
          description: description
        };
        // Send an AJAX POST request to the PHP file
        $.ajax({
          type: 'POST',
          url: 'add_item.php',
          data: data,
          success: function (response) {
            // Handle the response from the PHP file
            console.log(response + data);
            // Optionally, you can display a success message or perform any other actions
            alert('Product added successfully!');
            fetchProducts();
            // Hide the modal
            $('#addItemModal').removeClass('show');
            $('#addItemModal').removeAttr('role');
            $('#addItemModal').attr('aria-hidden', 'true');
            clearModalEffect();
          },
          error: function (xhr, status, error) {
            // Handle the error case
            console.log('AJAX request error:', error);
            alert('An error occurred while adding the product.');
          }
        });
      });
    });

    // EDIT ITEM
    $(document).ready(function () {
      // Attach a submit event listener to the form
      $('#editForm').submit(function editBtnClick(event) {
        // Prevent the default form submission
        event.preventDefault();
        // Get the input values
        var id = $('#itemIdEdit').val();
        var name = $('#itemNameEdit').val();
        var price = $('#itemPriceEdit').val();
        var type = $('#itemTypeEdit').val();
        var brand = $('#itemBrandEdit').val();
        var image = $('#itemImageEdit').val();
        var description = $('#itemDescriptionEdit').val();
        // Create an object with the values to send
        var data = {
          id: id,
          name: name,
          price: price,
          type: type,
          brand: brand,
          image: image,
          description: description
        };
        // Send an AJAX POST request to the PHP file
        $.ajax({
          type: 'POST',
          url: 'edit_item.php',
          data: data,
          success: function (response) {
            // Handle the response from the PHP file
            console.log(response + data);
            // Optionally, you can display a success message or perform any other actions
            alert('Product info changed successfully!');
            fetchProducts();
            // Hide the modal
            $('#editItemModal').removeClass('show');
            $('#editItemModal').removeAttr('role');
            $('#editItemModal').attr('aria-hidden', 'true');
            clearModalEffect();
          },
          error: function (xhr, status, error) {
            // Handle the error case
            console.log('AJAX request error:', error);
            alert('An error occurred while adding the product.');
          },
        });
      });
    });

    // DELETE ITEM
    document.getElementById('delteFormButton').onclick = function () {
      var itemId = $('#itemIdDelete').val();
      console.log(itemId);
      $.ajax({
        url: 'delete_item.php', // The server-side script to handle the deletion
        type: 'POST',
        data: { id: itemId }, // Pass any necessary data, such as the item ID
        success: function (response) {
          // Handle the response from the PHP file
          console.log(response + itemId);
          // Optionally, you can display a success message or perform any other actions
          alert('Product info changed successfully!');
          fetchProducts();
          // Hide the modal
          $('#deleteItemModal').modal('hide');
          clearModalEffect();
        },
        error: function () {
          alert('An error occurred while deleting the item.');
        }
      });

    }
    $('#deleteFormButton').oncli
    function clearModalEffect() {
      document.body.removeAttribute('style');
      document.body.classList.remove('modal-open');
      document.body.removeAttribute('data-bs-overflow');
      document.body.removeAttribute('data-bs-padding-right');
      $('div.modal-backdrop').remove();
    }
  </script>

  <!-- Validate Number Input-->
  <script>
    function validateInput(event) {
      const input = event.target.value;
      const regex = /^[0-9]*\.?[0-9]*$/;
      if (!regex.test(input)) {
        event.target.value = '';
      }
    }
  </script>

  <!-- Validate Character Input-->
  <script>
    function validateCharInput(event, button) {
      // Stop event propagation if the target element is an input
      if (event.target.tagName.toLowerCase() === "input") {
        return;
      }

      var modalContent = button.closest(".modal-content");
      var inputs = modalContent.querySelectorAll("input");

      // Clear previous error messages
      clearErrorMessages(modalContent);

      var isValid = true;

      for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        var value = input.value.trim();

        // Check if the input value is empty
        if (value === "") {
          displayErrorMessage(input, "Input value cannot be empty.");
          isValid = false;
        }

      }

      if (!isValid) {
        event.preventDefault(); // Prevent form submission or button click
      }
    }

    function displayErrorMessage(input, message) {
      var errorMessage = document.createElement("span");
      errorMessage.className = "error-message";
      errorMessage.textContent = message;

      var parent = input.parentNode;
      parent.appendChild(errorMessage);
    }

    function clearErrorMessages(container) {
      var errorMessages = container.querySelectorAll(".error-message");
      for (var i = 0; i < errorMessages.length; i++) {
        var errorMessage = errorMessages[i];
        errorMessage.parentNode.removeChild(errorMessage);
      }
    }
  </script>

</body>

</html>

<?php
} else {
     header("Location: login_form.php");
     exit();
}

?>