<!DOCTYPE html>
<html><!-- <? echo SITE_NAME ?> web app by Dan McKeown http://danmckeown.info -->
		<!-- copyright 2016 -->
<head>
	<title><? echo $title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<? $this->load->helper('url'); ?>
	<link rel="stylesheet" type="text/css" href="<? echo SITE_URL . '/assets/css/foundation.css' ?>" />
  <link rel="stylesheet" type="text/css" href="<? echo SITE_URL . '/assets/css/djmblog.css' ?>" />
  <script src="<? echo SITE_URL . '/assets/js/jquery.js' ?>"></script>
  <script src="<? echo SITE_URL . '/assets/js/foundation.js' ?>"></script>

  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

  <script type="text/javascript">
    // This identifies your website in the createToken call below
    Stripe.setPublishableKey("<?= STRIPE_PUBLIC_API_KEY ?>");

    var stripeResponseHandler = function(status, response) {
      var $form = $('#payment-form');

      if (response.error) {
        // Show the errors on the form
        $form.find('.payment-errors').text(response.error.message);
        $form.find('button').prop('disabled', false);
      } else {
        // token contains id, last4, and card type
        var token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        // and re-submit
        $form.get(0).submit();
      }
    };

    jQuery(function($) {
      $('#payment-form').submit(function(e) {
        var $form = $(this);

        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);

        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from submitting with the default action
        return false;
      });
    });
  </script>

</head>
<body>
	