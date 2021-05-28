import { IRawCode, IMathStore } from "../types";
import { DataPage } from "./page";
export declare type RangeInfo = {
    code: IRawCode;
    id: number;
};
export declare class RangeStore {
    private _ranges;
    private _parseContext;
    private _rangeOrder;
    private _counter;
    private _store;
    private _page;
    constructor(store: IMathStore, page: DataPage);
    get(name: string): RangeInfo;
    add(name: string, text: string): void;
    remove(name: string): void;
    serialize(): string[];
    _refresh(name: string): void;
    _next_id(): number;
}
