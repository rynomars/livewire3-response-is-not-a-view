## Repo Showing Livewire3 "Response is not a view" Bug
When a unit test calls a get request, that is standard controller with a view 
that has a livewire component, and calls ->assertViewHas() an exception is thrown
"The response is not a view."

Livewirem, when inserting the livewire.js, changes the "$response->original" value from
a View object to a string.

When the Laravel method, assertViewHas, ensures the response has a view. Since Livewire
changed the "original" value to a string, the assertion fails because the response is no
longer a view.
