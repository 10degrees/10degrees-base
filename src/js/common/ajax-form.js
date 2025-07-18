class AjaxForm {
    constructor() {
        this.formClass = '.js-ajax-form';
        this.init();
    }

    init() {
        document.body.addEventListener('submit', (e) => {
            const target = e.target;
            if (target.matches(this.formClass)) {
                e.preventDefault();
                this.handleSubmit(target);
            }
        });

        this.maybeSubmitOnLoad();
    }

    handleSubmit(form) {
        this.showLoading(form);

        const actionUrl = form.getAttribute('action');
        const formData = new FormData(form);

        fetch(actionUrl, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(result => this.handleSuccess(result, form))
        .catch(error => {
            console.error("AJAX error:", error);
        });
    }

    handleSuccess(result, form) {
        const refreshTarget = form.getAttribute('data-refresh');
        if (refreshTarget) {
            const targetEl = document.querySelector(refreshTarget);
            if (targetEl) {
                targetEl.innerHTML = result;
            }
        }
    }

    showLoading(form) {
        const refreshTarget = form.getAttribute('data-refresh');
        if (refreshTarget) {
            const targetEl = document.querySelector(refreshTarget);
            if (targetEl) {
                targetEl.innerHTML = '<div class="loading"><i class="fas fa-sync fa-spin"></i></div>';
            }
        }
    }

    maybeSubmitOnLoad() {
        document.querySelectorAll(this.formClass).forEach(form => {
            if (form.hasAttribute('data-submit-on-load')) {
                form.dispatchEvent(new Event('submit', { bubbles: true }));
            }
        });
    }
}

export default AjaxForm;
