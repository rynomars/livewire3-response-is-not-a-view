## Repo Showing Livewire3 "Response is not a view" Bug
When a unit test calls a get request, with a view that has a livewire component,
and calls the user calls ->assertViewHas() or ->assertViewIs() there is a phpunit failure of
"The response is not a view."

This prohibits anyone from using these method in their unit tests when using Livewire auto injection. 

Livewire, when inserting the livewire.js asset, changes the "$response->original" value from
a View object to a string. The Laravel response method "setContent" is used in the
SupportAutoInjectedAssets provide method

The methods assertViewHas and assertViewIs ensures the response "original" property is a view.
If the "original" response property is not a view, PHPUnit::fail('The response is not a view.');
is return and the tests fail. Since Livewire changed the "original" value to a string, the
assertion fails because the response is no longer a view.
