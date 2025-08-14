import "./bootstrap";
import Alpine from "alpinejs";

// Ihrachane Custom Components
window.ihrachane = {
    // Contact form handler
    contactForm: () => ({
        loading: false,
        success: false,
        formData: {
            first_name: "",
            last_name: "",
            phone_number: "",
            email: "",
            message: "",
            marketplaces: [],
        },

        async submitForm() {
            this.loading = true;
            try {
                const response = await fetch("/contact", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(this.formData),
                });

                if (response.ok) {
                    this.success = true;
                    this.resetForm();
                }
            } catch (error) {
                console.error("Form submission error:", error);
            } finally {
                this.loading = false;
            }
        },

        resetForm() {
            this.formData = {
                first_name: "",
                last_name: "",
                phone_number: "",
                email: "",
                message: "",
                marketplaces: [],
            };
        },
    }),

    // Service loader
    serviceLoader: () => ({
        services: [],
        loading: true,

        async loadServices() {
            try {
                const response = await fetch("/api/services");
                const data = await response.json();
                this.services = data.data || [];
            } catch (error) {
                console.error("Failed to load services:", error);
            } finally {
                this.loading = false;
            }
        },

        init() {
            this.loadServices();
        },
    }),

    // Navigation handler
    navigation: () => ({
        mobileMenuOpen: false,

        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        },

        closeMobileMenu() {
            this.mobileMenuOpen = false;
        },
    }),
};

window.Alpine = Alpine;
Alpine.start();
