# Admin Panel 💼

## Description 📝
Admin Panel is a Laravel project that serves as a management dashboard, built using the Filament and Modular packages. It provides a user-friendly interface for managing various aspects of your application.

## Features ✨
- User-friendly dashboard with intuitive navigation
- Modular structure for easy customization and extension
- Integration with Filament package for enhanced admin functionality
- Role-based access control for managing user permissions
- CRUD operations for managing data entities
- Responsive design for seamless user experience across devices
- Error handling and validation for data integrity
- Secure authentication and password hashing

## Installation 🚀
1. Clone the repository to your local machine:
   ```shell
   git clone https://github.com/MrAmiza/admin-panel.git
   ```
2. Navigate to the project directory:
   ```shell
   cd admin-panel
   ```
3. Install the dependencies using Composer:
   ```shell
   composer install
   ```
4. Configure your environment variables by creating a new `.env` file. You can use the provided `.env.example` as a starting point:
   ```shell
   cp .env.example .env
   ```
   Update the necessary values such as the database connection details.
5. Generate a new application key:
   ```shell
   php artisan key:generate
   ```
6. Run the database migrations and seed the necessary data:
   ```shell
   php artisan migrate --seed
   ```
7. Serve the application locally:
   ```shell
   php artisan serve
   ```
   The application will be accessible at `http://localhost:8000`.

## Usage 🖥️
- Access the admin panel by visiting the URL where you served the application.
- Use the provided login credentials to access the dashboard.
- Explore the various modules and features available in the admin panel.
- Customize and extend the functionality by modifying the modules or adding new ones using the Modular package.

## Contributing 🤝
Contributions are welcome! If you encounter any issues or have suggestions for improvements, please open an issue or submit a pull request on the [GitHub repository](https://github.com/MrAmiza/admin-panel).

## License 📜
This project is licensed under the [MIT License](https://opensource.org/licenses/MIT). You are free to modify and distribute the code, but please include appropriate attribution.
