# Pay.gov Connector

This module provides basic programmatic connectivity to pay.gov.

It supports two approaches: 

1. credit card web service payment gateway 
1. pay.gov hosted collection

**It is expected you furnish SSL-based transactions for your form.**

This module does not generate forms or automatically integrate into 
forms. You must program a form alter and a callback with your own 
mapping between your form fields.

## Setup

### Configuration

To configure the module, please go to `admin/config/system/pay-gov` and
fill out the default options. These options can be overridden by the 
callback.

### SSL

You may receive the following message:

`Error opening socket ssl://qa.tcs.pay.gov:443`

This is due to a missing SSL certificate. Pay.gov TCS uses security 
certificates issued by the Data Access Control Division (DACD) of the 
Bureau of Public Debt, in cooperation with the U.S. Treasury Bureau of 
the Fiscal Service, to identify and authenticate agency application 
servers, as well as granting access to specific TCS Web services.

## Payment Gateway Approach

### Form Alter

Add a secondary submit handler to your form.

Replace `MY-MODULE` with your custom module and `MY-FORM` with the 
form ID.

```
function MY-MODULE_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id === MY-FORM) {
    $form['#submit'][] = 'MY-MODULE_map_pay_gov';
  }
}
```

### Secondary Submit Handler

Map your form field values to the options passed to pay.gov. Note, some 
of the values will be hard-coded for the transaction (e.g. agency id).

**NOTE:** These options change by the pay.gov method used. The example 
below demonstrates the options for credit card processing.

Replace `MY-MODULE` with your custom module and your specific form 
fields.

```
function MY-MODULE_map_pay_gov(&$form, &$form_state) {
  // Create mapping.
  $options = array(
      'agency_id' => '944',
      'tcs_app_id' => '2601',
      'agency_tracking_id' => '101207103852841',
      'amount' => '15.25',
      'card_number' => $form_state['values']['card_number'],
      'card_exp_year' => $form_state['values']['card_exp_year'],
      'card_exp_month' => $form_state['values']['card_exp_month'],
      'first_name' => $form_state['values']['first_name'],
      'middle_initial' => $form_state['values']['middle_initial'],
      'last_name' => $form_state['values']['last_name'],
      'card_security_code' => $form_state['values']['card_security_code'],
      'billing_address1' => $form_state['values']['address1'],
      'billing_address2' => $form_state['values']['address2'],
      'billing_city' => $form_state['values']['city'],
      'billing_state' => $form_state['values']['state'],
      'billing_zip' => $form_state['values']['zip'],
      'email' => $form_state['values']['email'],
    );
    
    // Example call which uses default options.
    $response = pay_gov_invoke($options);
    // Example call which overrides the method only.
    $response = pay_gov_invoke($options, 'credit card');
    // Example call which overrides the method and environment.
    $response = pay_gov_invoke($options, 'credit card', 'https://qa.tcs.pay.gov');
    
    // You can perform custom processing of the response to get more data.
    
    // Get a generic pass/fail of the response.
    $processed = _pay_gov_process_response('credit card', $response);
}
```

## Hosted Collection Approach

### Form Alter

Add a secondary submit handler to your form.

Replace `MY-MODULE` with your custom module and `MY-FORM` with the 
form ID.

```
function MY-MODULE_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id === MY-FORM) {
    $form['#submit'][] = 'MY-MODULE_map_pay_gov';
  }
}
```

### Secondary Submit Handler
Map your form field values to the options passed to pay.gov. Note, some 
of the values will be hard-coded for the transaction (e.g. agency id).

**NOTE:** These options change by the pay.gov method used. The example 
below demonstrates the options for credit card processing.

Replace `MY-MODULE` with your custom module and your specific form 
fields.

```
function MY-MODULE_map_pay_gov(&$form, &$form_state) {
    // Create mapping from $form_state['values'].
    $application_id = '2601';
    $amount = '15.25';
   
    // Example call which overrides the method only.
    $transaction = pay_gov_initialize_hosted_collection($amount, $application_id);
    
    // Perform the redirect.
    pay_gov_hosted_collection_redirect($transaction);
}
```

After the user fills out the information on pay.gov, the hosted pay.gov 
application will invoke this module's success or cancel callback 
depending on the user action. 