require('dotenv').config();

const { PrismaClient } = require('@prisma/client');
const { PrismaPg } = require('@prisma/adapter-pg');

const globalStore = globalThis;

function getDatabaseOptions() {
  const configuredUrl = process.env.DATABASE_URL;
  if (!configuredUrl) {
    throw new Error('DATABASE_URL is not configured.');
  }

  const url = new URL(configuredUrl);
  const schema = url.searchParams.get('schema') || undefined;

  // node-postgres now treats sslmode=require as certificate verification unless
  // libpq compatibility is explicit. Supabase pooler URLs use libpq semantics.
  if (url.searchParams.get('sslmode') === 'require' && !url.searchParams.has('uselibpqcompat')) {
    url.searchParams.set('uselibpqcompat', 'true');
  }

  return {
    connectionString: url.toString(),
    schema,
  };
}

function createPrismaClient() {
  const { connectionString, schema } = getDatabaseOptions();

  const adapter = new PrismaPg({
    connectionString,
  }, {
    schema,
  });

  return new PrismaClient({ adapter });
}

const prisma = globalStore.__welcPrisma || createPrismaClient();

if (process.env.NODE_ENV !== 'production') {
  globalStore.__welcPrisma = prisma;
}

module.exports = { prisma };
