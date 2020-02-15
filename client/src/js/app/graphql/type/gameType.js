export default includeLink => `
    phrase
    players {
        id
        name
        tawColor
        fromCity {
            id
            name
            region {
                id
                name
            }
        }
        toCity {
            id
            name
            region {
                id
                name
            }
        }
        homeCity {
            id
            name
            region {
                id
                name
            }
        }

    }
`;
