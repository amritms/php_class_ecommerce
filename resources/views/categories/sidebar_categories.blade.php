<h4>Loaded from view composer</h4>
	<table>
@forelse($categories as $category)
<tr>
	<td>{{$category->name}}</td>

	</td>
</tr>
	@empty
	<tr>
	<td>
	no category found
	</td>
	</tr>
@endforelse
</table>

