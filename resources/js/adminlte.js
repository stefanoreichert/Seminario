import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';

const initializeCustomerDemoInteractions = () => {
    const searchInput = document.querySelector('[data-client-search]');
    const addressFilter = document.querySelector('[data-client-address-filter]');
    const clientRows = [...document.querySelectorAll('[data-client-row]')];
    const emptyMessage = document.querySelector('[data-client-empty]');
    const resultCount = document.querySelector('[data-client-result-count]');

    if (searchInput && addressFilter && clientRows.length > 0) {
        const updateClientRows = () => {
            const searchTerm = searchInput.value.trim().toLocaleLowerCase();
            const addressFilterValue = addressFilter.value;
            let visibleRows = 0;

            clientRows.forEach((row) => {
                const matchesSearch = row.dataset.clientSearchText.includes(searchTerm);
                const hasAddress = row.dataset.clientHasAddress === 'true';
                const matchesAddressFilter =
                    addressFilterValue === 'all' ||
                    (addressFilterValue === 'with-address' && hasAddress) ||
                    (addressFilterValue === 'without-address' && !hasAddress);
                const isVisible = matchesSearch && matchesAddressFilter;

                row.classList.toggle('d-none', !isVisible);
                visibleRows += Number(isVisible);
            });

            emptyMessage?.classList.toggle('d-none', visibleRows > 0);

            if (resultCount) {
                resultCount.textContent = String(visibleRows);
            }
        };

        searchInput.addEventListener('input', updateClientRows);
        addressFilter.addEventListener('change', updateClientRows);
    }

    document.querySelectorAll('[data-demo-client-form]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const notice = form.querySelector('[data-demo-form-notice]');

            if (notice) {
                notice.textContent = 'Demostración visual: no se guardaron cambios ni datos.';
                notice.classList.remove('d-none');
            }
        });
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeCustomerDemoInteractions, { once: true });
} else {
    initializeCustomerDemoInteractions();
}
