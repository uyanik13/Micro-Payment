<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">{{htmlentities($product['paytext'])}}</div>
            <div class="panel-body">
                <p><?php echo htmlentities($product['description']); ?></p>
                <p>Price: <?php echo $product['currency'] . ' ' . number_format($product['amount'] / 100, 2, '.', ''); ?></p>
            </div>
            <div class="panel-footer">
                <ul class="list-inline">
                    <?php
                    $securedParameters = [
                        'project'  => config('micro-payment.MICROPAYMENT_PROJECT_IDENTIFIER'),
                        'title'    => $productId,
                        'paytext'  => $product['paytext'],
                        'amount'   => $product['amount'],
                        'currency' => $product['currency'],
                        'testmode' => config('micro-payment.MICROPAYMENT_TESTMODE'),

                        'mp_user_firstname'    => $currentUser['firstname'],
                        'mp_user_surname'      => $currentUser['surname'],
                        'mp_user_email'        => $currentUser['email'],
                        'mp_user_id'           => sha1($currentUser['email'] . $currentUserId),
                        'sensitiveCustomParam' => $currentUser['username'],
                    ];

                    // Define the parameters that should NOT be sealed (not URL-encoded)
                    $unsecuredParameters = [
                        //'lang' => 'en', // language of payment window
                        'anotherCustomParam' => 'custom-param-2',
                    ];

                    // generate links for all enabled payment methods
                    foreach (getPaymentMethodCollection(true) as $paymentMethod) {
                        // Build the URL
                        $unsealedUrl = $paymentMethod['url'] . '?' . http_build_query($securedParameters, '', '&') . '&seal=&' . http_build_query($unsecuredParameters, '', '&');

                        // Seal the URL using the function `sealUrl` and your accesskey
                        $sealedUrl = sealUrl(MICROPAYMENT__ACCESSKEY, $unsealedUrl);

                        $formParameters = [];
                        parse_str(parse_url($sealedUrl, PHP_URL_QUERY), $formParameters);


                        ?>
                        <li style="margin:10px">
                            <form action="<?php echo htmlspecialchars($paymentMethod['url']); ?>" method="GET" target="_blank">
                                <?php foreach ($formParameters as $formParameterName => $formParameterValue) { ?>
                                    <input type="hidden" name="<?php echo htmlspecialchars($formParameterName); ?>" value="<?php echo htmlspecialchars($formParameterValue); ?>">
                                <?php } ?>

                                <input type="image" id="image" alt="Pay now" src="//www.micropayment.de/resources/?what=img&group=<?php echo urlencode($paymentMethod['resource-group']); ?>&show=<?php echo urlencode($paymentMethod['resource-image']); ?>">
                            </form>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">Current user: <code><?php echo htmlentities($currentUserId); ?></code></div>
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <?php foreach ($currentUser as $key => $value) { ?>
                        <dt><?php echo htmlentities($key); ?></dt>
                        <dd><?php echo htmlentities($value); ?></dd>
                    <?php } ?>
                </dl>
            </div>
        </div>
    </div>
</div>
