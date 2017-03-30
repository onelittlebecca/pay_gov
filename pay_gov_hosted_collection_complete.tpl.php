<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <S:Header/>
  <S:Body>
    <ns2:completeOnlineCollection xmlns:ns2="http://fms.treas.gov/services/tcsonline">
      <completeOnlineCollectionRequest>
        <tcs_app_id><?php print $options['tcsAppID']; ?></tcs_app_id>
        <token><?php print $options['token']; ?></token>
      </completeOnlineCollectionRequest>
    </ns2:completeOnlineCollection>
  </S:Body>
</S:Envelope>