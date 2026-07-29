CREATE TABLE "welc_users" (
    "id" UUID NOT NULL,
    "name" VARCHAR(100) NOT NULL,
    "email" VARCHAR(320) NOT NULL,
    "password_hash" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMPTZ(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMPTZ(6) NOT NULL,

    CONSTRAINT "welc_users_pkey" PRIMARY KEY ("id")
);

CREATE TABLE "welc_sessions" (
    "id" UUID NOT NULL,
    "token_hash" CHAR(64) NOT NULL,
    "user_id" UUID NOT NULL,
    "expires_at" TIMESTAMPTZ(6) NOT NULL,
    "created_at" TIMESTAMPTZ(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT "welc_sessions_pkey" PRIMARY KEY ("id")
);

CREATE UNIQUE INDEX "welc_users_email_key" ON "welc_users"("email");
CREATE UNIQUE INDEX "welc_sessions_token_hash_key" ON "welc_sessions"("token_hash");
CREATE INDEX "welc_sessions_user_id_idx" ON "welc_sessions"("user_id");
CREATE INDEX "welc_sessions_expires_at_idx" ON "welc_sessions"("expires_at");

ALTER TABLE "welc_sessions"
ADD CONSTRAINT "welc_sessions_user_id_fkey"
FOREIGN KEY ("user_id") REFERENCES "welc_users"("id")
ON DELETE CASCADE ON UPDATE CASCADE;
