'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const inline = require('./inline-aa15f113.js');
const fetch = require('./fetch-d644cebd.js');
require('./add-query-args-49dcb630.js');
require('./remove-query-args-b57e8cd3.js');

const scPaystackAddMethodCss = ":host{display:block}";
const ScPaystackAddMethodStyle0 = scPaystackAddMethodCss;

const ScPaystackAddMethod = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.liveMode = true;
        this.customerId = undefined;
        this.successUrl = undefined;
        this.currency = undefined;
        this.loading = undefined;
        this.loaded = undefined;
        this.error = undefined;
        this.paymentIntent = undefined;
    }
    async handlePaymentIntentCreate() {
        var _a, _b;
        const { public_key, access_code } = ((_b = (_a = this.paymentIntent) === null || _a === void 0 ? void 0 : _a.processor_data) === null || _b === void 0 ? void 0 : _b.paystack) || {};
        // we need this data.
        if (!public_key || !access_code)
            return;
        const paystack = new inline.se();
        await paystack.newTransaction({
            key: public_key,
            accessCode: access_code, // We'll use accessCode which will handle product, price on our server.
            onSuccess: async (transaction) => {
                if ((transaction === null || transaction === void 0 ? void 0 : transaction.status) !== 'success') {
                    throw { message: wp.i18n.sprintf(wp.i18n.__('Paystack transaction could not be finished. Status: %s', 'surecart'), transaction === null || transaction === void 0 ? void 0 : transaction.status) };
                }
                window.location.assign(this.successUrl);
            },
            onClose: err => {
                console.error(err);
                alert((err === null || err === void 0 ? void 0 : err.message) || wp.i18n.__('The payment did not process. Please try again.', 'surecart'));
            },
        });
    }
    async createPaymentIntent() {
        var _a, _b;
        try {
            this.loading = true;
            this.error = '';
            this.paymentIntent = await fetch.apiFetch({
                method: 'POST',
                path: 'surecart/v1/payment_intents',
                data: {
                    processor_type: 'paystack',
                    reusable: true,
                    live_mode: this.liveMode,
                    customer_id: this.customerId,
                    currency: this.currency,
                    refresh_status: true,
                },
            });
        }
        catch (e) {
            this.error = ((_b = (_a = e === null || e === void 0 ? void 0 : e.additional_errors) === null || _a === void 0 ? void 0 : _a[0]) === null || _b === void 0 ? void 0 : _b.message) || (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.loading = false;
        }
    }
    render() {
        return (index.h(index.Host, { key: 'e0780055dc059c8fb79842da8e1dfb161d7af13a' }, this.error && (index.h("sc-alert", { key: 'f4f4bb141deb410fb6257f61a13044238822172d', open: !!this.error, type: "danger" }, index.h("span", { key: '2b6fdb8d8cc9d925805b841cf9f2653e4584dc50', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), index.h("div", { key: '274ba0441626c85c790491b2c72f43f96c075118', class: "sc-paystack-button-container" }, index.h("sc-alert", { key: 'daf2367a54b388c1a39c7cb60dc1aef952fa06fa', open: true, type: "warning" }, wp.i18n.__('In order to add a new card, we will need to make a small transaction to authenticate it. This is for authentication purposes and will be immediately refunded.', 'surecart'), index.h("div", { key: '40c9a0d83bd0a31ca1aea315fdf4836954c3443e' }, index.h("sc-button", { key: 'cc74f5b6c530901f280965345b24e82c23c29131', loading: this.loading, type: "primary", onClick: () => this.createPaymentIntent(), style: { marginTop: 'var(--sc-spacing-medium)' } }, wp.i18n.__('Add New Card', 'surecart')))))));
    }
    static get watchers() { return {
        "paymentIntent": ["handlePaymentIntentCreate"]
    }; }
};
ScPaystackAddMethod.style = ScPaystackAddMethodStyle0;

exports.sc_paystack_add_method = ScPaystackAddMethod;

//# sourceMappingURL=sc-paystack-add-method.cjs.entry.js.map