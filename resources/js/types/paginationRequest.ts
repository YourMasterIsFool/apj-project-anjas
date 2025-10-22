export interface PaginationRequest<T = undefined> {
    search?: string;
    limit: number;
    cursor?: string;
    query?: T;
}
