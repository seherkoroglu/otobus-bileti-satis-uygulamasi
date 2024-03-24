<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="header py-3 text-center">
            <h2>Payment</h2>
        </div>
        <section>
            <form id="payment-form">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="amount">Amount (ZAR)</label>
                    <input type="number" id="amount" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" class="form-control" />
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-primary">Pay</button>
                </div>
            </form>
        </section>
    </div>

    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function payWithPaystack() {
            let handler = PaystackPop.setup({
                key: 'pk_test_f282c6fe1981b4b52220c218bf987211a997f39c', // Replace with your public key
                email: document.getElementById("email").value,
                amount: document.getElementById("amount").value * 100, // Convert to kobo (100 kobo = 1 ZAR)
                currency: "ZAR", // Specify currency as ZAR
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate a pseudo-unique reference
                onClose: function () {
                    alert('Window closed.');
                },
                callback: function (response) {
                    let message = 'Payment complete! Reference: ' + response.reference;
                    alert(message);

                    setTimeout(function(){
                    window.location.href = "/dashboard"; // Yönlendirme yapılacak sayfa
                }, 1000); // Bekleme süresi: 3000 milisaniye (3 saniye)
                }
            });

            handler.openIframe();
        }

        $(document).ready(function () {
            $("#payment-form").submit(function (e) {
                e.preventDefault();
                payWithPaystack();
            });
        });
    </script>
</body>
</html>
