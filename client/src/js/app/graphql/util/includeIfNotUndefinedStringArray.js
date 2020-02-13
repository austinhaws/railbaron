// removes empty strings so that it doesn't get """""" multi line empty string graphql notation which breaks the server
export default (field, value) => (!value || !value.length) ? '' : `${field}: ["""${value.filter(s => s).join('""","""')}"""]`;
