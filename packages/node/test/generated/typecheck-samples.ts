// @ts-check
import { Easymailing } from "../../src/index.js";

declare const em: Easymailing;

// These should compile.
em.audiences.list({ page: 1 });
em.audiences.list({ itemsPerPage: 50 });
em.mySubscription.get();
em.audiences("AUD").members.subscribe("M", { channels: ["email"] });
em.audiences("AUD").members.addToGroup("MEMBER", "GROUP");

// These should not compile.
// @ts-expect-error -- page must be number
em.audiences.list({ page: "1" });

// @ts-expect-error -- mySubscription is a singleton, no .list()
em.mySubscription.list();

// @ts-expect-error -- members(...) requires audience scope first
em.members.subscribe("M", {});
