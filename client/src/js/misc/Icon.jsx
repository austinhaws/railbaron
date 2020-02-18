import React from 'react';

export default {
    dice: className => (
        <svg viewBox="0 0 180 155" xmlns="http://www.w3.org/2000/svg">
            <path d="m1.4099 104.11 76.898 49.704 56.311-16.892 44.377-86.084-76.898-49.704-56.31 16.892z" className={className.border}/>
            <path d="m45.807 18.021 76.898 49.704-44.397 86.09" className={className.border}/>
            <path d="m122.67 67.737 56.33-16.898" className={className.border}/>
            <circle transform="rotate(30)" cx="70.976" cy="16.881" r="7.1276" className={className.pip}/>
            <circle transform="rotate(30)" cx="96.732" cy="43.123" r="7.1276" className={className.pip}/>
            <circle transform="rotate(30)" cx="122.49" cy="69.366" r="7.1276" className={className.pip}/>
            <ellipse transform="matrix(.21001 .9777 -.95256 .30436 0 0)" cx="122.92" cy="-106.18" rx="6.0646" ry="6.1957" className={className.pip}/>
            <ellipse transform="matrix(.9777 -.21001 .30436 .95256 0 0)" cx="96.9" cy="57.26" rx="6.0646" ry="6.1957" className={className.pip}/>
            <ellipse transform="matrix(.21001 .9777 -.95256 .30436 0 0)" cx="150.94" cy="-106.33" rx="6.0646" ry="6.1957" className={className.pip}/>
        </svg>
    ),

    garbage: className => (
        <svg
            className={className}
            viewBox="0 0 120 148"
            xmlns="http://www.w3.org/2000/svg"
        >
            <g>
                <path d="m9.7886 14.092 8.3155 133.05"/>
                <path d="m111.46 14.092-8.3155 133.05"/>
                <path d="m18.104 147.14h85.045"/>
                <path d="m0.75496 13.941h118.68"/>
                <path d="m32.996 20.819 8.3155 121.79"/>
                <path d="m89.693 20.819-8.3155 121.79"/>
                <path d="m61.269 20.91v121.32"/>
                <path d="m0.75495 13.941 2.4353-13.04"/>
                <path d="m119.32 13.906-2.4352-13.04"/>
                <path d="m3.1902 0.90108h113.64"/>
            </g>
        </svg>
    ),

    pencil: className => (
        <svg
            className={className}
            viewBox="0 0 210 260"
            xmlns="http://www.w3.org/2000/svg"
        >
            <g>
                <path d="m135.7 26.747-127.81 168.22"/>
                <path d="m190.03 68.098-127.81 168.22"/>
                <path d="m132.62 65.843-108.15 142.34"/>
                <path d="m209.6 42.163-22.204 29.225"/>
                <path d="m155.16 0.89788-19.635 25.843"/>
                <path d="m152.45 80.676-107.92 142.04"/>
                <path d="m170.08 94.243-54.362-41.303"/>
                <path d="m176.41 86.294-54.208-41.186"/>
                <path d="m183.2 77.401-54.557-41.451"/>
                <path d="m189.87 68.555-54.162-41.151"/>
                <path d="m62.215 236.32-61.349 23.962"/>
                <path d="m209.52 42.21-54.362-41.311"/>
                <path d="m7.8914 194.97-7.0255 65.31"/>
                <path d="m62.215 236.32-54.362-41.303"/>
            </g>
        </svg>
    ),

    taw: ({className, style}) => (
        <svg viewBox="0 0 133 198" className={className} style={style}>
            <path
                d="m80.45 14.364c0-7.3062-5.9228-13.229-13.229-13.229s-13.229 5.9228-13.229 13.229c0 5.1821 2.9797 9.6683 7.3551 11.777l-17.351 135.26c-41.88 0-42.394 27.48-42.394 27.48s0.5435 7.48 42.424 7.48h45.253c41.927 0 42.456-7.45 42.456-7.45s-0.529-27.45-42.388-27.155l-17.376-135.13c4.9615-1.8193 8.48-6.6287 8.48-12.26"/>
        </svg>
    ),
}
