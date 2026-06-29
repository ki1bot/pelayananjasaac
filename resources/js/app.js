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
    const konten = document.getElementById("kontenAplikasi");
    const overlay = document.querySelector("[data-sidebar-overlay]");
    const tombolBukaSidebar = document.querySelectorAll("[data-sidebar-open]");
    const tombolTutupSidebar = document.querySelectorAll(
        "[data-sidebar-close]",
    );
    const linkSidebar = document.querySelectorAll("[data-sidebar-link]");

    if (!sidebar || !konten || !overlay) {
        return;
    }

    const isDesktop = () => window.innerWidth >= 1024;

    const sidebarSedangTerbuka = () => {
        if (isDesktop()) {
            return !sidebar.classList.contains("sidebar-tertutup");
        }

        return sidebar.classList.contains("sidebar-aktif");
    };

    const sinkronkanTampilan = () => {
        const terbuka = sidebarSedangTerbuka();

        tombolBukaSidebar.forEach((tombol) => {
            tombol.classList.toggle("hidden", terbuka);
            tombol.setAttribute("aria-expanded", terbuka ? "true" : "false");
        });

        tombolTutupSidebar.forEach((tombol) => {
            tombol.setAttribute("aria-expanded", terbuka ? "true" : "false");
        });

        if (isDesktop()) {
            overlay.classList.remove("overlay-aktif");
            document.body.classList.remove("overflow-hidden");

            if (sidebar.classList.contains("sidebar-tertutup")) {
                konten.classList.add("konten-sidebar-tertutup");
            } else {
                konten.classList.remove("konten-sidebar-tertutup");
            }

            return;
        }

        konten.classList.remove("konten-sidebar-tertutup");

        if (sidebar.classList.contains("sidebar-aktif")) {
            overlay.classList.add("overlay-aktif");
            document.body.classList.add("overflow-hidden");
        } else {
            overlay.classList.remove("overlay-aktif");
            document.body.classList.remove("overflow-hidden");
        }
    };

    const bukaSidebar = () => {
        if (isDesktop()) {
            sidebar.classList.remove("sidebar-tertutup");
            konten.classList.remove("konten-sidebar-tertutup");
        } else {
            sidebar.classList.add("sidebar-aktif");
        }

        sinkronkanTampilan();
    };

    const tutupSidebar = () => {
        if (isDesktop()) {
            sidebar.classList.add("sidebar-tertutup");
            konten.classList.add("konten-sidebar-tertutup");
        } else {
            sidebar.classList.remove("sidebar-aktif");
        }

        sinkronkanTampilan();
    };

    tombolBukaSidebar.forEach((tombol) => {
        tombol.addEventListener("click", bukaSidebar);
    });

    tombolTutupSidebar.forEach((tombol) => {
        tombol.addEventListener("click", tutupSidebar);
    });

    overlay.addEventListener("click", tutupSidebar);

    linkSidebar.forEach((link) => {
        link.addEventListener("click", () => {
            if (!isDesktop()) {
                tutupSidebar();
            }
        });
    });

    window.addEventListener("resize", sinkronkanTampilan);

    sinkronkanTampilan();
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
                    borderRadius: 16,
                    borderSkipped: false,
                    backgroundColor: "rgba(37, 99, 235, 0.42)",
                    borderColor: "rgba(37, 99, 235, 0.75)",
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
                    ticks: {
                        font: {
                            weight: 700,
                        },
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
