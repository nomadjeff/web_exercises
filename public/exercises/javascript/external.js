var movies = [
	{
		"title": "Rudy",
		"year": "1993",
		"rating": "7.5",
		"length": "114 minutes",
		"studio": "Tristar",
		"director": "David Anspaugh"
	},
	{
		"title": "Short Circuit",
		"year": "1986",
		"rating": "6.5",
		"length": "98 minutes",
		"studio": "Tristar",
		"director": "John Badham"
	},
	{
		"title": "The Karate Kid",
		"year": "1984",
		"rating": "7.2",
		"length": "126 minutes",
		"studio": "Columbia",
		"director": "John G. Avildsen"
	},
	{
		"title": "The Shawshank Redemption",
		"year": "1984",
		"rating": "9.3",
		"length": "142 minutes",
		"studio": "Castle Rock",
		"director": "Frank Darabont"
	},
	{
		"title": "The Goonies",
		"year": "1985",
		"rating": "7.8",
		"length": "114 minutes",
		"studio": "Warner Bros",
		"director": "Richard Donner"
	}
];

movies.forEach(function(element, index, array){
	console.log(element.title + "(" element.year + ")";
});