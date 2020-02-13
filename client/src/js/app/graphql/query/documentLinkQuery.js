// document passed so if the document sub graphql query
// gets inputs then it can get just the one document
export default (provider, document) =>
`
	searchPractice(search: {id: ${provider.id}}) {
		documents {
			id
			link
		}
	}
`;
