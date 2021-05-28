export declare function getContextMenuStruct(): ({
    id: string;
    value: string;
    icon: string;
    items?: undefined;
} | {
    id: string;
    value: string;
    icon: string;
    items: {
        id: string;
        value: string;
    }[];
} | {
    id: string;
    value: string;
    icon: string;
    items: {
        id: string;
        value: string;
        icon: string;
    }[];
})[];
