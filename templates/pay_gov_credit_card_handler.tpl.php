<sch:PCSaleRequest xmlns:sch="http://fms.treas.gov/tcs/schemas"
                   xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                   xsi:schemaLocation="http://fms.treas.gov/tcs/schemas transaction_types.xsd">
  <sch:agency_id><?php print $options['agency_id']; ?></sch:agency_id>
  <sch:tcs_app_id><?php print $options['tcs_app_id']; ?></sch:tcs_app_id>
  <sch:PCSale>
    <sch:agency_tracking_id><?php print $options['agency_tracking_id']; ?></sch:agency_tracking_id>
    <sch:transaction_amount><?php print $options['amount']; ?></sch:transaction_amount>
    <sch:account_number><?php print $options['card_number']; ?></sch:account_number>
    <sch:credit_card_expiration_date><?php print $options['card_exp_year']; ?>-<?php print $options['card_exp_month']; ?></sch:credit_card_expiration_date>
    <sch:first_name><?php print $options['first_name']; ?></sch:first_name>
    <sch:middle_initial><?php print $options['middle_initial']; ?></sch:middle_initial>
    <sch:last_name><?php print $options['last_name']; ?></sch:last_name>
    <sch:card_security_code><?php print $options['card_security_code']; ?></sch:card_security_code>
    <sch:credit_card_track2></sch:credit_card_track2>
    <sch:billing_address><?php print $options['billing_address1']; ?></sch:billing_address>
    <sch:billing_address_2><?php print $options['billing_address2']; ?></sch:billing_address_2>
    <sch:billing_city><?php print $options['billing_city']; ?></sch:billing_city>
    <sch:billing_state><?php print $options['billing_state']; ?></sch:billing_state>
    <sch:billing_zip><?php print $options['billing_zip']; ?></sch:billing_zip>
    <sch:billing_country></sch:billing_country>
    <sch:order_id></sch:order_id>
    <sch:order_tax_amount></sch:order_tax_amount>
    <sch:custom_fields>
      <sch:custom_field_1></sch:custom_field_1>
      <sch:custom_field_2></sch:custom_field_2>
    </sch:custom_fields>
    <sch:account_holder_email_address><?php print $options['email']; ?></sch:account_holder_email_address>
    <sch:classification>
      <sch:classification_data classification_id="0" amount="0"/>
      <sch:classification_data classification_id="0" amount="0"/>
      <sch:classification_data classification_id="0" amount="0"/>
    </sch:classification>
  </sch:PCSale>
</sch:PCSaleRequest>
