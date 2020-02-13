export default includeLink => `
	id
	name
	description
	contentType
	size
	${includeLink ? 'link' : ''}
	submittedDate
`;
