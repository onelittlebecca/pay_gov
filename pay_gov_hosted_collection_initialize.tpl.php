<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <S:Header/>
  <S:Body>
    <ns2:startOnlineCollection xmlns:ns2="http://fms.treas.gov/services/tcsonline">
      <tcs:startOnlineCollection>
        <startOnlineCollectionRequest>
          <tcs_app_id><?php print $options['tcs_app_id']; ?></tcs_app_id>
          <agency_tracking_id><?php print $options['agency_id']; ?></agency_tracking_id>
          <transaction_type>Sale</transaction_type>
          <transaction_amount><?php print $options['amount']; ?></transaction_amount>
          <language><?php print $options['lang']; ?></language>
          <url_success><?php print $options['url_success']; ?></url_success>
          <url_cancel><?php print $options['url_cancel']; ?></url_cancel>
        </startOnlineCollectionRequest>
    </ns2:startOnlineCollection>
  </S:Body>
</S:Envelope>