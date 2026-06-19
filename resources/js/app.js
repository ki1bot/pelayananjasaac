import { createIcons, icons } from "lucide";
import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", () => {
    createIcons({ icons });

    jalankanSidebar();
    jalankanProfil();
    jalankanPassword();
    jalankanGrafikProduk();
});

function jalankanSidebar() {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.querySelector("[data-sidebar-overlay]");
    const tombolSidebar = document.querySelectorAll("[data-sidebar-toggle]");

    if (!sidebar || !overlay || tombolSidebar.length === 0) {
        return;
    }

    tombolSidebar.forEach((tombol) => {
        tombol.addEventListener("click", () => {
            sidebar.classList.toggle("sidebar-aktif");
            overlay.classList.toggle("overlay-aktif");
        });
    });

    overlay.addEventListener("click", () => {
        sidebar.classList.remove("sidebar-aktif");
        overlay.classList.remove("overlay-aktif");
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            overlay.classList.remove("overlay-aktif");
        }
    });
}

function jalankanProfil() {
    const tombolProfil = document.querySelector("[data-profile-toggle]");
    const menuProfil = document.querySelector("[data-profile-menu]");

    if (!tombolProfil || !menuProfil) {
        return;
    }

    tombolProfil.addEventListener("click", (event) => {
        event.stopPropagation();
        menuProfil.classList.toggle("hidden");
    });

    menuProfil.addEventListener("click", (event) => {
        event.stopPropagation();
    });

    document.addEventListener("click", () => {
        menuProfil.classList.add("hidden");
    });
}

function jalankanPassword() {
    const tombolPassword = document.querySelectorAll("[data-password-toggle]");

    if (tombolPassword.length === 0) {
        return;
    }

    tombolPassword.forEach((tombol) => {
        tombol.addEventListener("click", () => {
            const targetId = tombol.getAttribute("data-password-target");
            const input = document.getElementById(targetId);
            const iconBuka = tombol.querySelector("[data-password-eye-open]");
            const iconTutup = tombol.querySelector("[data-password-eye-close]");

            if (!input || !iconBuka || !iconTutup) {
                return;
            }

            const tampilkanPassword = input.type === "password";

            input.type = tampilkanPassword ? "text" : "password";
            iconBuka.classList.toggle("hidden", tampilkanPassword);
            iconTutup.classList.toggle("hidden", !tampilkanPassword);
        });
    });
}

function jalankanGrafikProduk() {
    const canvas = document.getElementById("grafikProduk");
    const dataGrafik = document.getElementById("dataGrafikProduk");

    if (!canvas || !dataGrafik) {
        return;
    }

    const labels = JSON.parse(dataGrafik.getAttribute("data-labels") || "[]");
    const values = JSON.parse(dataGrafik.getAttribute("data-values") || "[]");

    new Chart(canvas, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Harga Dasar",
                    data: values,
                    borderRadius: 14,
                    borderSkipped: false,
                    backgroundColor: "rgba(59, 130, 246, 0.45)",
                    borderColor: "rgba(37, 99, 235, 0.7)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        boxWidth: 14,
                        boxHeight: 14,
                        useBorderRadius: true,
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const nilai = Number(
                                context.raw || 0,
                            ).toLocaleString("id-ID");
                            return "Harga Dasar: Rp " + nilai;
                        },
                    },
                },
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return (
                                "Rp " + Number(value).toLocaleString("id-ID")
                            );
                        },
                    },
                },
            },
        },
    });
}
