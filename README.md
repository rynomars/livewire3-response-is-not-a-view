## Repo Showing Livewire3 "Response is not a view" Bug
When a unit test calls a get request, with a view that has a livewire component,
and the user calls ->assertViewHas() or ->assertViewIs() there is a phpunit failure of
"The response is not a view."

This prohibits anyone from using these method in their unit tests when using Livewire auto injection. 

Livewire, when inserting the livewire.js asset, is unintentionally, changing the "$response->original" value from
a View object to a string. The Laravel response method "setContent" is used in the
SupportAutoInjectedAssets provide method. The "setContent" method sets the "original" property.
When it is called from Livewire, "original" is changed to a string.

The methods assertViewHas and assertViewIs ensures the response "original" property is a View.
If the "original" response property is not a View, PHPUnit::fail('The response is not a view.');
is return and the test fails. Since Livewire changed the "original" value to a string, the
assertion fails because the response is no longer a View.

The included unit test, "test_response_view_has_passes_successfully" shows the bug.
