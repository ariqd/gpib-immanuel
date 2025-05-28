# GPIB Immanuel Church Website

This is the official website for the GPIB Immanuel Church, designed to serve as a central hub for information and event registration for the congregation.

---

## 📜 Description

The GPIB Immanuel Church website provides a seamless platform for members to register for church services and events. It also serves as a comprehensive source of information regarding church activities, news, and announcements. The primary goal of this project is to enhance communication and engagement within the church community.

---

## ✨ Features

* **Event Registration:** Allows users to easily register for upcoming church services and events.
* **Information Hub:** Provides up-to-date information on church news, schedules, and announcements.
* **User-Friendly Interface:** Designed with a clean and intuitive interface for easy navigation.

---

## 💻 Tech Stack

* **Backend:** [Laravel](https://laravel.com/) - A PHP web application framework with expressive, elegant syntax.
* **Frontend:** JavaScript, HTML/CSS
* **Database:** MySQL or other relational database compatible with Laravel.

---

## 🚀 Getting Started

To get a local copy up and running, follow these simple steps.

### Prerequisites

Make sure you have the following installed on your local development machine:
* PHP (version compatible with the project's `composer.json`)
* [Composer](https://getcomposer.org/)
* A database server (e.g., MySQL, PostgreSQL)
* Node.js and npm (optional, for frontend asset management)

### Installation

1.  **Clone the repo:**
    ```sh
    git clone https://github.com/ariqd/gpib-immanuel.git
    ```
2.  **Navigate to the project directory:**
    ```sh
    cd gpib-immanuel
    ```
3.  **Install PHP dependencies:**
    ```sh
    composer install
    ```
4.  **Create a copy of the `.env` file:**
    ```sh
    cp .env.example .env
    ```
5.  **Configure your environment variables** in the `.env` file. At a minimum, you'll need to set up your database connection details (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

6.  **Generate an application key:**
    ```sh
    php artisan key:generate
    ```
7.  **Run the database migrations** to create the necessary tables. You may also want to seed the database if seeders are available.
    ```sh
    php artisan migrate --seed
    ```
8.  **(Optional) Install frontend dependencies:**
    ```sh
    npm install && npm run dev
    ```
9.  **Start the local development server:**
    ```sh
    php artisan serve
    ```
    The application will be available at `http://127.0.0.1:8000`.

---

## 🤝 Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".

Don't forget to give the project a star! Thanks again!

1.  Fork the Project
2.  Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3.  Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4.  Push to the Branch (`git push origin feature/AmazingFeature`)
5.  Open a Pull Request

This project was created by **Ariq Daffa Athallah Putra**. You can find more of his work on his [GitHub profile](https://github.com/ariqd).

---

## 📝 License

Distributed under the MIT License.
