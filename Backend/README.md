# Updating Environment, Running Migrations, and Seeding Database

This guide outlines the steps required to update your environment configuration, run database migrations, and seed the database.

## Table of Contents

1. [Updating Environment Variables](#updating-environment-variables)
2. [Running Migrations](#running-migrations)
3. [Seeding the Database](#seeding-the-database)

---

## Updating Environment Variables

1. Locate the `.env` file in the root directory of your project.
2. Open the `.env` file using a text editor.

### Database Configuration

Update the following variables to match your database configuration:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

# Running Migrations

To create the necessary tables in your database, you'll use Laravel's migration feature. This command will execute all pending migrations and create the required tables in your database.

```bash
php artisan migrate
```

## Seeding the Database

Seeding the database involves populating it with initial data, which can be helpful for testing or getting started with a populated database.

Follow these steps:

1. Open a terminal or command prompt.
2. Navigate to the root directory of your Laravel project.
3. Run the following command:

```bash
php artisan db:seed
```

# Customer Controller API Documentation

This API provides endpoints for managing customer information, performing transactions, and retrieving promotions and news.

## Table of Contents

1. [Top Up Balance](#top-up-balance)
2. [Make Transaction](#make-transaction)
3. [Get Promotions](#get-promotions)
4. [Get News](#get-news)

---

## Top Up Balance

### Endpoint

`POST /api/customer/{id}/top-up`

### Description

This endpoint allows you to top up the balance of a customer.

### Parameters

| Parameter | Type   | Description                            |
| --------- | ------ | -------------------------------------- |
| `id`      | int    | The ID of the customer to top up.      |
| `amount`  | double | The amount to be added to the balance. |

### Response

-   `200 OK` on success
    -   Returns a JSON object with a success message.
    -   Example response:
        ```json
        {
            "message": "Balance topped up successfully"
        }
        ```
-   `404 Not Found` if the customer is not found.
    -   Returns a JSON object with an error message.
    -   Example response:
        ```json
        {
            "message": "Customer not found"
        }
        ```

---

## Make Transaction

### Endpoint

`POST /api/customer/{id}/make-transaction`

### Description

This endpoint allows you to make a transaction for a customer.

### Parameters

| Parameter | Type   | Description                                          |
| --------- | ------ | ---------------------------------------------------- |
| `id`      | int    | The ID of the customer making the transaction.       |
| `amount`  | double | The total amount of the transaction.                 |
| `items`   | array  | An array of items with details for the transaction.  |
|           |        | - `product_name`: string, the name of the product.   |
|           |        | - `product_price`: double, the price of the product. |
|           |        | - `quantity`: int, the quantity of the product.      |

### Response

-   `200 OK` on success
    -   Returns a JSON object with a success message.
    -   Example response:
        ```json
        {
            "message": "Transaction successful"
        }
        ```
-   `400 Bad Request` if the customer has insufficient balance.
    -   Returns a JSON object with an error message.
    -   Example response:
        ```json
        {
            "message": "Insufficient balance"
        }
        ```
-   `404 Not Found` if the customer is not found.
    -   Returns a JSON object with an error message.
    -   Example response:
        ```json
        {
            "message": "Customer not found"
        }
        ```

---

## Get Promotions

### Endpoint

`GET /api/customer/get-promotions`

### Description

This endpoint allows you to retrieve a list of available promotions.

### Response

-   `200 OK` on success
    -   Returns a JSON array of promotion objects.
    -   Example response:
        ```json
        [
            {
                "id": 1,
                "title": "Promotion Title 1",
                "description": "Promotion Description 1"
            },
            {
                "id": 2,
                "title": "Promotion Title 2",
                "description": "Promotion Description 2"
            }
        ]
        ```

---

## Get News

### Endpoint

`GET /api/customer/get-news`

### Description

This endpoint allows you to retrieve a list of news articles.

### Response

-   `200 OK` on success
    -   Returns a JSON array of news objects.
    -   Example response:
        ```json
        [
            {
                "id": 1,
                "title": "News Title 1",
                "content": "News Content 1"
            },
            {
                "id": 2,
                "title": "News Title 2",
                "content": "News Content 2"
            }
        ]
        ```

Please make sure to replace {id} in the endpoints with the actual customer ID.

Feel free to reach out if you have any further questions or need additional assistance!
