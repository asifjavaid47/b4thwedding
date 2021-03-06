PayPal PHP SDK release notes
============================

v0.13.1
----
* Enabled TLS version 1.x for SSL Negotiation
* Updated Identity Support from SDK Core
* Fixed Backward Compatibility changes

v0.13.0
----
* Enabled Payment Experience

v0.12.0
----
* Enabled EC Parameters Support for Payment APIs
* Enabled Validation for Missing Accessors

v0.11.1
----
* Removed Dependency from SDK Core Project
* Enabled Future Payments

v0.11.0
----
* Ability for PUT and PATCH requests
* Invoice number, custom and soft descriptor
* Order API and tests, more Authorization tests
* remove references to sdk-packages
* patch for retrieving paid invoices
* Shipping address docs patch
* Remove @array annotation
* Validate return cancel url
* type hinting, comment cleaning, and getters and setters for Shipping

v0.8.0
-----
* Invoicing API support added

v0.7.1
-----
* Added support for Reauthorization

v0.7.0
-----
* Added support for Auth and Capture APIs
* Types modified to match the API Spec
* Updated SDK to use namespace supported core library

v0.6.0
-----
* Adding support for dynamic configuration of SDK (Upgrading sdk-core-php dependency to V1.4.0)
* Deprecating the setCredential method and changing resource class methods to take an ApiContext argument instead of a OauthTokenCredential argument.

v0.5.0
-----
* Initial Release
