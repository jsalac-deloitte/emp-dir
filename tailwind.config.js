/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/js/**/*.{vue,js}"],
    theme: {
        extend: {
            backgroundImage: {
                login: "url('../../public/images/login.svg')",
                login2: "url('../../public/images/login2.svg')",
                "forgot-password":
                    "url('../../public/images/forgot-password.svg')",
                "reset-password":
                    "url('../../public/images/reset-password.svg')",
                network: "url('../../public/images/phonebook.svg')",
            },
            colors: {
                primary: "#90CAF9",
                secondary: "#37474F",
                navy: "#064069",
                "navy-light": "#085d99",
            },
        },
    },
    plugins: [],
};
