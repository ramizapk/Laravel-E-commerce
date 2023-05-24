# Laravel E-commerce Project

This is a web application built with Laravel framework that functions as an online store. Users can view products, make purchases, add items to their shopping cart, and create wishlists. The project also includes an admin dashboard for administrators to manage the store.

## Features

-   User Registration and Authentication: Users can create accounts, log in, and manage their profiles.
-   Product Listings: Users can browse through a wide range of products and view detailed information about each product.
-   Shopping Cart: Users can add products to their shopping cart and proceed to checkout to complete the purchase.
-   Wishlist: Users can create wishlists to save products for future reference.
-   Payment Methods: The application supports multiple payment methods, allowing users to choose their preferred option for making purchases.
-   Admin Dashboard: Administrators can access a dedicated dashboard to manage products, orders, and user accounts.
-   Order Management: Users can view their order history, and administrators can manage orders from the admin dashboard.

## Technologies Used

-   Laravel: A powerful PHP framework used for developing the web application.
-   MySQL: The database management system used to store product, user, and order information.
-   HTML, CSS, and JavaScript: Front-end technologies used for designing and enhancing the user interface.
-   Git: Version control system used for tracking changes and collaborating on the project.

## Installation

To run this project locally, make sure you have PHP, Composer, and MySQL installed on your system. Then follow these steps:

1. Clone the repository: `git clone https://github.com/ramizapk/Laravel-E-commerce`
2. Navigate to the project directory: `cd your-repo`
3. Install dependencies: `composer install`
4. Create a copy of the `.env.example` file and rename it to `.env`
5. Generate an application key: `php artisan key:generate`
6. import the database in the 'Mysql Database' folder.
7. Configure your database connection details in the `.env` file
8. make a virtual host with `admin.market.local` for admin and `market.local` for users r you can change this links in route file.
9. Start the development server: `php artisan serve`

The application will now be accessible at `admin.market.local` , `market.local`.

## Contributing

If you'd like to contribute to this project, please follow these guidelines:

1. Fork the repository
2. Create a new branch: `git checkout -b feature/your-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin feature/your-feature`
5. Submit a pull request

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Acknowledgements

-   [Laravel](https://laravel.com) documentation and community for their excellent resources.
-   The contributors of the open-source packages used in this project.
-   Special thanks to [Ramiz] for their guidance and support.
