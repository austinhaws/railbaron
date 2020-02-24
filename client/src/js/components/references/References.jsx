import "core-js/stable";
import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import webserviceContext from "../../app/webservice/webserviceContext";

const propTypes = {};
const defaultProps = {};

const References = () => {
    const classes = useContext(ClassesContext);

    return (
        <div className={classes.references__content}>
            <div className={classes.references__content__reference}>
                <div className={classes.references__content__reference__title}>
                    GraphQL EndPoint
                </div>
                <div className={classes.references__content__reference__list}>
                    <a href={webserviceContext}>{webserviceContext}</a>
                </div>
            </div>
            <div className={classes.references__content__reference}>
                <div className={classes.references__content__reference__title}>
                    Related Sites:
                </div>
                <div className={classes.references__content__reference__list}>
                    <ul>
                        {
                            [
                                {title: 'RBP Chart', ref: 'http://www.railgamefans.com/rbp/rbpchart.htm'},
                                {title: 'Board Game Geek', ref: 'https://boardgamegeek.com/boardgame/420/rail-baron'},
                                {title: 'Rail Baron Tools', ref: 'https://www.ewert-technologies.ca/home/products/rail-baron-tools-home/rail-baron-tools-user-guide.html'},
                            ].map(link => <li key={link.title}><a href={link.ref} target="_blank">{link.title}</a></li>)
                        }
                    </ul>
                </div>
            </div>
        </div>
    );
};

References.propTypes = propTypes;
References.defaultProps = defaultProps;

export default References;
