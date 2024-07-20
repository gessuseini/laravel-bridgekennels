export const setGlobalSettings = (state, settings) => {
    state.globalSettings = settings;
};

export function setUser(state, user) {
    state.user.data = user;
}

export function setToken(state, token) {
    state.user.token = token;
    if(token) {
        sessionStorage.setItem('TOKEN', token);
    }
    else {
        sessionStorage.removeItem('TOKEN');
    }
}

export function setDogs(state, [loading, response = null]) {
    if(response) {
        state.dogs = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        }
    }
    state.dogs.loading = loading;
}

export function setTeamMembers(state, [loading, response = null]) {
    if(response) {
        state.team_members = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        }
    }
    state.team_members.loading = loading;
}

export function setBreedings(state, [loading, response = null]) {
    if(response) {
        state.breedings = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        }
    }
    state.breedings.loading = loading;
}

export function setNewsletters(state, [loading, response = null]) {
    if (response) {
        state.newsletters = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        };
    }
    state.newsletters.loading = loading;
}

export function setSubscribers(state, [loading, response = null]) {
    if (response) {
        state.subscribers = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        };
    }
    state.subscribers.loading = loading;
}

export function setFAQs(state, [loading, response = null]) {
    if (response) {
        state.faqs = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        };
    }
    state.faqs.loading = loading;
}

export function setUsers(state, [loading, response = null]) {
    if(response) {
        state.users = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,

        }
    }
    state.users.loading = loading;
}
