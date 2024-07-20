import axiosClient from "../axios";

// Global Settings
export const fetchGlobalSettings = ({ commit }) => {
    return axiosClient.get('/settings')
        .then(response => {
            commit('setGlobalSettings', response.data);
        });
};

export const updateGlobalSettings = ({ commit }, settings) => {
    return axiosClient.post('/settings', settings)
        .then(response => {
            commit('setGlobalSettings', response.data);
        });
};

// User Authentication
export function getUser({ commit }) {
    return axiosClient.get('/user')
        .then(({ data }) => {
            commit('setUser', data);
            return data;
        });
}

export function login({ commit }, data) {
    return axiosClient.post('/login', data)
        .then(({ data }) => {
            commit('setUser', data.user);
            commit('setToken', data.token);
            return data;
        });
}

export function logout({ commit }) {
    return axiosClient.post('/logout')
        .then((response) => {
            commit('setToken', null);
            return response;
        });
}

// Dogs
export function getDogs({ commit }, { url = null, search = '', perPage = 10 } = {}) {
    commit('setDogs', [true]);
    url = url || '/dogs';
    return axiosClient.get(url, {
        params: { search, per_page: perPage }
    })
        .then(res => {
            commit('setDogs', [false, res.data]);
        })
        .catch(() => {
            commit('setDogs', [false]);
        });
}

export function getDog({}, id) {
    return axiosClient.get(`/dogs/${id}`);
}

export function createDog({ commit }, dog) {
    return axiosClient.post('/dogs', transformToFormData(dog));
}

export function updateDog({ commit }, dog) {
    const id = dog.id;
    return axiosClient.post(`/dogs/${id}`, transformToFormData(dog, true));
}

export function deleteDog({ commit }, id) {
    return axiosClient.delete(`/dogs/${id}`);
}


// Breedings
export function getBreedings({ commit }, { url = null, search = '', perPage = 10 } = {}) {
    commit('setBreedings', [true]);
    url = url || '/breedings';
    return axiosClient.get(url, {
        params: { search, per_page: perPage }
    })
        .then(res => {
            commit('setBreedings', [false, res.data]);
        })
        .catch(() => {
            commit('setBreedings', [false]);
        });
}

export function getBreeding({}, id) {
    return axiosClient.get(`/breedings/${id}`);
}

export function createBreeding({ commit }, breeding) {
    return axiosClient.post('/breedings', transformToFormData(breeding));
}

export function updateBreeding({ commit }, breeding) {
    const id = breeding.id;
    return axiosClient.post(`/breedings/${id}`, transformToFormData(breeding, true));
}

export function deleteBreeding({ commit }, id) {
    return axiosClient.delete(`/breedings/${id}`);
}

// Newsletters
export function getNewsletters({ commit }, { url = null, search = '', perPage = 10 } = {}) {
    commit('setNewsletters', [true]);
    url = url || '/newsletters';
    return axiosClient.get(url, {
        params: { search, per_page: perPage }
    })
        .then(res => {
            commit('setNewsletters', [false, res.data]);
        })
        .catch(() => {
            commit('setNewsletters', [false]);
        });
}

export function getNewsletter({}, id) {
    return axiosClient.get(`/newsletters/${id}`);
}

export function createNewsletter({ commit }, newsletter) {
    return axiosClient.post('/newsletters', transformToFormData(newsletter));
}

export function updateNewsletter({ commit }, newsletter) {
    const id = newsletter.id;
    return axiosClient.post(`/newsletters/${id}`, transformToFormData(newsletter, true));
}

export function deleteNewsletter({ commit }, id) {
    return axiosClient.delete(`/newsletters/${id}`);
}

export function sendNewsletter({ commit }, newsletterId) {
    return axiosClient.post(`/newsletters/${newsletterId}/send`)
        .then(response => {
            return response.data;
        })
        .catch(error => {
            throw error;
        });
}

// Subscribers
export function getSubscribers({ commit }, { url = null, search = '', perPage = 10 } = {}) {
    commit('setSubscribers', [true]);
    url = url || '/subscribers';
    return axiosClient.get(url, {
        params: { search, per_page: perPage }
    })
        .then(res => {
            commit('setSubscribers', [false, res.data]);
        })
        .catch(() => {
            commit('setSubscribers', [false]);
        });
}

export function getSubscriber({}, id) {
    return axiosClient.get(`/subscribers/${id}`);
}

export function createSubscriber({ commit }, subscriber) {
    return axiosClient.post('/subscribers', transformToFormData(subscriber));
}

export function updateSubscriber({ commit }, subscriber) {
    const id = subscriber.id;
    return axiosClient.post(`/subscribers/${id}`, transformToFormData(subscriber, true));
}

export function deleteSubscriber({ commit }, id) {
    return axiosClient.delete(`/subscribers/${id}`);
}

// Team Members
export function getTeamMembers({ commit }, { url = null, search = '', perPage = 10 } = {}) {
    commit('setTeamMembers', [true]);
    url = url || '/teammembers';
    return axiosClient.get(url, {
        params: { search, per_page: perPage }
    })
        .then(res => {
            commit('setTeamMembers', [false, res.data]);
        })
        .catch(() => {
            commit('setTeamMembers', [false]);
        });
}

export function getTeamMember({}, id) {
    return axiosClient.get(`/teammembers/${id}`);
}

export function createTeamMember({ commit }, team_member) {
    return axiosClient.post('/teammembers', transformToFormData(team_member));
}

export function updateTeamMember({ commit }, team_member) {
    const id = team_member.id;
    return axiosClient.post(`/teammembers/${id}`, transformToFormData(team_member, true));
}

export function deleteTeamMember({ commit }, id) {
    return axiosClient.delete(`/teammembers/${id}`);
}

// FAQs
export function getFAQs({ commit }, { url = null, search = '', perPage = 10 } = {}) {
    commit('setFAQs', [true]);
    url = url || '/faq';
    return axiosClient.get(url, {
        params: { search, per_page: perPage }
    })
        .then(res => {
            commit('setFAQs', [false, res.data]);
        })
        .catch(() => {
            commit('setFAQs', [false]);
        });
}

export function getFAQ({}, id) {
    return axiosClient.get(`/faq/${id}`);
}

export function createFAQ({ commit }, faq) {
    return axiosClient.post('/faq', transformToFormData(faq));
}

export function updateFAQ({ commit }, faq) {
    const id = faq.id;
    return axiosClient.post(`/faq/${id}`, transformToFormData(faq, true));
}

export function deleteFAQ({ commit }, id) {
    return axiosClient.delete(`/faq/${id}`);
}

// Users
export function getUsers({ commit }, { url = null, search = '', perPage = 10 } = {}) {
    commit('setUsers', [true]);
    url = url || '/users';
    return axiosClient.get(url, {
        params: { search, per_page: perPage }
    })
        .then(res => {
            commit('setUsers', [false, res.data]);
        })
        .catch(() => {
            commit('setUsers', [false]);
        });
}

export function getSpecificUser({}, id) {
    return axiosClient.get(`/users/${id}`);
}

export function createUser({ commit }, user) {
    return axiosClient.post('/users', transformToFormData(user));
}

export function updateUser({ commit }, user) {
    const id = user.id;
    return axiosClient.post(`/users/${id}`, transformToFormData(user, true));
}

export function deleteUser({ commit }, id) {
    return axiosClient.delete(`/users/${id}`);
}

// Utility function to transform object to FormData
function transformToFormData(obj, isUpdate = false) {
    const form = new FormData();
    for (const key in obj) {
        form.append(key, obj[key]);
    }
    if (isUpdate) {
        form.append('_method', 'PUT');
    }
    return form;
}
