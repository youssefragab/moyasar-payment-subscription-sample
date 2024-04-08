$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".subscribe").click(function() {

    var isAuth = $('#is-auth').val();
    if(isAuth == "false") {
        $('#exampleModal').modal('toggle');
        return;
    }

    var id     = $(this).attr("data-id");
    var amount = parseFloat($(this).attr("data-amount")) * 100;
    var name   = $(this).attr("data-name");

    initiateMoyasarPaymentForm(amount, name,id);

});

function initiateMoyasarPaymentForm(amount, description,id) {
    var moyasar_key          = $('#moyasar-key').val();
    var moyasar_redirect_url = $('#moyasar-redirect-url').val();

    Moyasar.init({
        element: '.moyasar',
        amount: amount,
        currency: 'SAR',
        description: description,
        publishable_api_key: moyasar_key,
        callback_url: moyasar_redirect_url,
        methods: ['creditcard'],
        on_completed: function (payment) {
            return new Promise(function (resolve, reject) {
                var createPayment = createSubscription(payment, id);
                if(createPayment) {
                    resolve({});
                }
            });
        },
    })

    $('#moyasarModal').modal('toggle');
}

function createSubscription(payment, id) {
    var payment_id = payment.id;
    var plan_id    = id;
    var createSubscription = $.ajax({
        url: '/subscription/payment',
        type: 'POST',
        async: false,
        cache: false,
        data: {payment_id: payment_id, plan_id: plan_id},
        done: function(response){
            if(response.success == "true") {
                return true
            }
        },
        fail: function(){
            return false;
        },
    })
    if(createSubscription) {
        return true;
    }
    return false;
}